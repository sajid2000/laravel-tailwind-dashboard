@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge([
    'type' => 'text',
    'class' => 'px-4 py-2 block rounded shadow text-gray-600 border border-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-purple-500 duration-150 transition dark:border-gray-500 dark:placeholder-gray-500 dark:focus:shadow-outline-gray dark:focus:placeholder-gray-600 dark:bg-gray-700 dark:text-gray-200',
]) }} />
