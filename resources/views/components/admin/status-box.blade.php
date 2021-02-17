@props(['title' => '', 'subtitle' => '', 'icon' => '', 'iconClasses' => ''])
<div {{ $attributes->merge([
    'class' => 'flex items-center p-4 bg-white rounded-lg shadow-lg dark:bg-gray-800'
]) }}>
    <div class="p-3 mr-4 w-10 h-10 flex items-center justify-center overflow-hidden rounded-full {{ $iconClasses }}">
        <i class="{{ $icon }}"></i>
    </div>
    <div>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            {{ $title }}
        </p>
        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            {{ $subtitle }}
        </p>
    </div>
</div>
