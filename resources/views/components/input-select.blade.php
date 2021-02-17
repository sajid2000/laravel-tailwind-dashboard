@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge([
    'class' => 'mt-2 px-4 py-2 block rounded shadow text-gray-600 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-purple-400 duration-150 transition bg-white dark:border-gray-500 dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200'
]) }}>
    {{ $slot }}
</select>