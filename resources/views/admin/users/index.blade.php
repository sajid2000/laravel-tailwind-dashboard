<x-admin-layout>
    <x-card>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h4 class="font-semibold text-gray-800 dark:text-gray-200">User List</h4>
                <x-button title="Add new" href="{{ route('admin.users.create') }}"/>
            </div>
        </x-slot>
        <div class="overflow-x-auto">
            <form method="get" class="m-2 bg-blue-100 dark:bg-gray-900 px-4 rounded flex justify-between items-center">
                @foreach (request()->except(['per_page', 'search_term']) as $key => $value)
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}"/>
                @endforeach
                <x-form-select label="Show" class="inline-block m-0 ml-2" name="per_page" onchange="selectSubmit(event)">
                    <option {{ $users->perPage() == 5   ? 'selected' : '' }}>5</option>
                    <option {{ $users->perPage() == 10  ? 'selected' : '' }}>10</option>
                    <option {{ $users->perPage() == 20  ? 'selected' : '' }}>20</option>
                    <option {{ $users->perPage() == 50  ? 'selected' : '' }}>50</option>
                    <option {{ $users->perPage() == 100 ? 'selected' : '' }}>100</option>
                </x-form-select>
                <div>
                    <x-button title="Delete All" id="delete-selected" x-on:click="deleteUsers($event, $dispatch)"/>
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
                            <x-input-checkbox data-checkboxes="user" data-checkbox-role="select-all" />
                        </x-table-heading>
                        <x-table-heading title="Photo" />
                        <x-table-heading title="Name" />
                        <x-table-heading title="Email" />
                        <x-table-heading title="Roles" />
                        <x-table-heading title="Options" />
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <x-table-data>
                                <x-input-checkbox
                                    data-checkboxes="user"
                                    id="user_{{ $user->id }}"
                                    name="users[]"
                                    value="{{ $user->id }}"
                                />
                            </x-table-data>
                            <x-table-data>
                                <img src="{{ $user->photo_url }}" class="object-cover rounded-full w-16 h-16 shadow-md" />
                            </x-table-data>
                            <x-table-data>{{ $user->name }}</x-table-data>
                            <x-table-data>{{ $user->email }}</x-table-data>
                            <x-table-data>{{ $user->role->name ?? '' }}</x-table-data>
                            <x-table-data>
                                <x-button href="{{ route('admin.users.show', $user->id) }}" class="bg-green-500">
                                    <i class="fas fa-eye"></i>
                                </x-button>
                                <x-button href="{{ route('admin.users.edit', $user->id) }}" class="bg-indigo-500">
                                    <i class="fas fa-pen"></i>
                                </x-button>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="inline-block p-0 m-0" onsubmit="return confirm('Are you sure?')">
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
            {{ $users->links() }}
        </div>
    </x-card>
    <script type="text/javascript">
        function deleteUsers($event, $dispatch) {
            const ids = [...document.querySelectorAll('input[name="users[]"]:checked')].map(el => el.value);

            deleteSelected($dispatch, '{{ route('admin.users.destroyMany') }}', ids);
        }
    </script>
</x-admin-layout>
