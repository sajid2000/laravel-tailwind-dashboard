<x-admin-layout>
    <x-card>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h4 class="font-semibold text-gray-800 dark:text-gray-200">Role List</h4>
                <x-button title="Add new" href="{{ route('admin.roles.create') }}"/>
            </div>
        </x-slot>
        <div class="overflow-x-auto">
            <form method="get" class="m-2 bg-blue-100 dark:bg-gray-900 px-4 rounded flex justify-between items-center">
                @foreach (request()->except(['per_page', 'search_term']) as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}"/>
                @endforeach
                <x-form-select label="Show" class="inline-block m-0 ml-2" name="per_page" onchange="selectSubmit(event)">
                    <option {{ $roles->perPage() == 5   ? 'selected' : '' }}>5</option>
                    <option {{ $roles->perPage() == 10  ? 'selected' : '' }}>10</option>
                    <option {{ $roles->perPage() == 20  ? 'selected' : '' }}>20</option>
                    <option {{ $roles->perPage() == 50  ? 'selected' : '' }}>50</option>
                    <option {{ $roles->perPage() == 100 ? 'selected' : '' }}>100</option>
                </x-form-select>
                <div>
                    <x-button title="Delete All" id="delete-selected" x-on:click="deleteRoles($event, $dispatch)"/>
                    <x-button title="Export" />
                </div>
                <div class="flex items-center dark:text-gray-200">
                    <strong>Search</strong> <x-input name="search_term" class="ml-2"/>
                </div>
            </form>
            <table class="items-center w-full border-collapse text-sm whitespace-nowrap">
                <thead>
                    <tr>
                        <x-table-heading>
                            <x-input-checkbox data-checkboxes="role" data-checkbox-role="select-all" />
                        </x-table-heading>
                        <x-table-heading title="Name" />
                        <x-table-heading title="Slug" />
                        <x-table-heading title="Permissions" />
                        <x-table-heading title="Options" />
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <x-table-data>
                                <x-input-checkbox
                                    data-checkboxes="role"
                                    id="role_{{ $role->id }}"
                                    name="roles[]"
                                    value="{{ $role->id }}"
                                />
                            </x-table-data>
                            <x-table-data>{{ $role->name }}</x-table-data>
                            <x-table-data>{{ $role->slug }}</x-table-data>
                            <x-table-data>
                                <div class="whitespace-normal">
                                    @foreach ($role->permissions as $permission)
                                        <span class="inline-block text-xs font-semibold text-white p-1 bg-indigo-500 mr-1 mb-2 rounded">
                                            {{ $permissions[$permission] }}
                                        </span>
                                    @endforeach
                                </div>
                            </x-table-data>
                            <x-table-data>
                                <x-button href="{{ route('admin.roles.show', $role->id) }}" class="bg-green-500">
                                    <i class="fas fa-eye"></i>
                                </x-button>
                                <x-button href="{{ route('admin.roles.edit', $role->id) }}" class="bg-indigo-500">
                                    <i class="fas fa-pen"></i>
                                </x-button>
                                <form action="{{ route('admin.roles.destroy', $role->id) }}" method="post" class="inline-block p-0 m-0" onsubmit="return confirm('Are you sure?')">
                                    @csrf @method('DELETE')
                                    <x-button type="submit" class="bg-red-700">
                                        <i class="fas fa-trash-alt"></i>
                                    </x-button>
                                </form>
                            </x-table-data>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 rounded text-white font-semibold dark:text-gray-200">
            {{ $roles->links() }}
        </div>
    </x-card>
    <script type="text/javascript">
        function deleteRoles($event, $dispatch) {
            const ids = [...document.querySelectorAll('input[name="roles[]"]:checked')].map(el => el.value);

            deleteSelected($dispatch, '{{ route('admin.roles.destroyMany') }}', ids);
        }
    </script>
</x-admin-layout>
