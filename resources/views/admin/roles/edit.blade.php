<x-admin-layout>
    <x-card>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                    Edit Role ({{ $role->name }})
                </h4>
                <x-button title="Add new" href="{{ route('admin.roles.create') }}"/>
            </div>
        </x-slot>
        <form method="post" action="{{ route('admin.roles.update', $role->id) }}" >
            @csrf @method('PUT')

            <x-form-input label="Name*" name="name" value="{{ $role->name }}" class="w-full" />

            <x-form-input label="slug*" name="slug" value="{{ $role->slug }}" class="w-full" />


            @isset($permissions)
            <x-form-select label="Permissions" name="permissions[]" multiple="" class="select2 w-full">
                @foreach ($permissions as $permissionId => $permissionName)
                    <option
                        value="{{ $permissionId }}"
                        @foreach ($role->permissions as $role_perm)
                            {{ $role_perm == $permissionId ? 'selected' : '' }}
                        @endforeach
                    >
                        {{ $permissionName }}
                    </option>
                @endforeach
            </x-form-select>
            @endisset

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