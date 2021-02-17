<td {{ $attributes->merge([
    'class' => 'border-t-0 px-4 align-middle border-l-0 border-r-0 p-4 text-gray-600 dark:text-gray-300 border-gray-200 dark:border-gray-700',
]) }}>
    {{ $attributes->get('title', $slot) }}
</td>