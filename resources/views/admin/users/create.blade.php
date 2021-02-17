<x-admin-layout>
    <x-card>
        <x-slot name="header">
            <div class="flex justify-between">
                <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                    Add New User
                </h4>
                <x-button title="back" onclick="window.history.back()"/>
            </div>
        </x-slot>
        <form method="post" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
            @csrf

            <x-form-input class="w-full" label="Name*" name="name" value="{{ old('name') }}" />

            <x-form-input class="w-full" label="Email*" type="email" name="email" value="{{ old('email') }}" />

            <x-form-input class="w-full" label="Password*" type="password" name="password" />

            <x-form-input class="w-full" label="Photo*" type="file" name="photo" />

            <x-form-select class="w-full select2" label="Role" name="role_id">
                @foreach ($roles as $id => $name)
                    <option value="{{ $id }}" {{ old('role_id') == $id ? 'selected' : '' }}>
                        {{ $name }}
                    </option>
                @endforeach
            </x-form-select>

            <x-button type="submit" title="create" />
        </form>
    </x-card>
</x-admin-layout>

{{-- @push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/dist/css/select2.min.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('admin/plugins/select2/dist/js/select2.full.min.js') }}"></script>
@endpush --}}
