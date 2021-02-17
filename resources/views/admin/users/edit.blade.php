<x-admin-layout>
    <x-card>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                    Edit User ({{ $user->name }})
                </h4>
                <x-button title="Add new" href="{{ route('admin.users.create') }}"/>
            </div>
        </x-slot>
        <form method="post" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
            @csrf @method('PUT')

            <x-form-input label="Name*" name="name" value="{{ $user->name }}" class="w-full" />

            <x-form-input label="Email*" type="email" name="email" value="{{ $user->email }}" class="w-full" />

            <x-form-input label="Password*" type="password" name="password" class="w-full" />

            <x-form-input class="w-full" label="Photo*" type="file" name="photo" />

            <x-form-select label="Role" name="role_id" class="select2 w-full">
                @foreach ($roles as $id => $name)
                    <option value="{{ $id }}" {{ ($user->role->id ?? false) == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </x-form-select>

            <x-button type="submit" title="Update" />
        </form>
    </x-card>
</x-admin-layout>

{{-- @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('admin/plugins/select2/dist/js/select2.full.min.js') }}"></script>
@endpush --}}
