@props(['label' => '', 'disabled' => false])

<input type="checkbox" {{ $disabled ? 'disabled' : '' }} {{ $attributes->merge([
    'class' => 'text-purple-600 text-lg rounded shadow-md border border-gray-400 focus:ring focus:ring-purple-500 focus:ring-offset-1 dark:border-gray-500 dark:focus:shadow-outline-gray  dark:bg-gray-700 dark:text-gray-800',
]) }} />