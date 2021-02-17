<x-admin-layout>
    <x-card>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                    Role details ({{ $role->name }})
                </h4>
                <x-button title="Add new" href="{{ route('admin.roles.create') }}"/>
            </div>
        </x-slot>
        <table class="w-full border-collapse text-left font-thin">
            <tr class="bg-gray-100 dark:bg-gray-900 border-b dark:border-gray-700">
                <th class="p-4"> Name </th>
                <td class="p-4">:</td>
                <td class="p-4">{{ $role->name }}</td>
            </tr>
            <tr class="bg-gray-100 dark:bg-gray-900 border-b dark:border-gray-700">
                <th class="p-4"> Slug </th>
                <td class="p-4">:</td>
                <td class="p-4">{{ $role->slug }}</td>
            </tr>
            <tr class="bg-gray-100 dark:bg-gray-900 border-b dark:border-gray-700">
                <th class="p-4"> Permissions </th>
                <td class="p-4">:</td>
                <td class="p-4">
                    @foreach ($role->permissions as $id)
                        <span class="inline-block text-xs font-semibold text-white p-1 bg-indigo-500 mr-1 mb-2 rounded">
                            {{ $permissions[$id] }}
                        </span>
                    @endforeach
                </td>
            </tr>
        </table>

    </x-card>
</x-admin-layout>