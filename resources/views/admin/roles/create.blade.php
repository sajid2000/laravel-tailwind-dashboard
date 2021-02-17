<x-admin-layout>
    <x-card>
        <x-slot name="header">
            <div class="flex justify-between dark:text-gray-200">
                <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                    Add New Role
                </h4>
                <x-button title="back" onclick="window.history.back()"/>
            </div>
        </x-slot>
        <form method="post" action="{{ route('admin.roles.store') }}">
            @csrf

            <x-form-input label="Name*" name="name" value="{{ old('name') }}" class="w-full" />

            <x-form-input label="Slug*" name="slug" value="{{ old('slug') }}" class="w-full" />

            @isset($permissions)
            <x-form-select label="Permissions" name="permissions[]" multiple="" class="select2 w-full">
                @foreach ($permissions as $permissionId => $permissionName)
                    <option value="{{ $permissionId }}">
                        {{ $permissionName }}
                    </option>
                @endforeach
            </x-form-select>
            @endisset

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
