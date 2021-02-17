<th {{ $attributes->merge([
    'class' => 'px-4 align-middle border border-solid py-3 uppercase border-l-0 border-r-0 whitespace-no-wrap font-semibold text-left text-gray-600 dark:text-gray-200 border-gray-200 dark:border-gray-700',
]) }}>
    {{ $attributes->get('title', $slot) }}
</th>