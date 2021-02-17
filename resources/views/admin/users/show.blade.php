<x-admin-layout>
    <x-card>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h4 class="font-semibold text-gray-800 dark:text-gray-200">
                    User details ({{ $user->name }})
                </h4>
                <x-button title="Add new" href="{{ route('admin.users.create') }}"/>
            </div>
        </x-slot>
        <table class="w-full border-collapse text-left font-thin">
            <tr class="bg-gray-100 dark:bg-gray-900 border-b dark:border-gray-700">
                <th class="p-4"> Name </th>
                <td class="p-4">:</td>
                <td class="p-4">{{ $user->name }}</td>
            </tr>
            <tr class="bg-gray-100 dark:bg-gray-900 border-b dark:border-gray-700">
                <th class="p-4"> Email </th>
                <td class="p-4">:</td>
                <td class="p-4">{{ $user->email }}</td>
            </tr>
            <tr class="bg-gray-100 dark:bg-gray-900 border-b dark:border-gray-700">
                <th class="p-4"> Role </th>
                <td class="p-4">:</td>
                <td class="p-4"> {{ $user->role->name }} </td>
            </tr>
            <tr class="bg-gray-100 dark:bg-gray-900 border-b dark:border-gray-700">
                <th class="p-4"> Photo </th>
                <td class="p-4">:</td>
                <td class="p-4">
                    <img src="{{ $user->photo_url }}" class="object-cover rounded w-20 h-20 shadow-outline-gray">
                </td>
            </tr>
        </table>

    </x-card>
</x-admin-layout>