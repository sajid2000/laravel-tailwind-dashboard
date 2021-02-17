<!-- Card -->
<div {{ $attributes->merge(['class' => 'p-4 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800']) }}>
    <div class="rounded-t mb-2 p-2 border-b border-blue-500">
        {{ $header }}
    </div>
    <div class="text-sm text-gray-600 dark:text-gray-400">
        {{ $slot }}
    </div>
</div>
<!-- /Card -->