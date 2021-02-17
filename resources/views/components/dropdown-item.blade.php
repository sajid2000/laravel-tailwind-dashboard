@props(['href' => false])
@if($href !== false)
<a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'flex items-center block px-4 py-2 text-sm leading-5 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'
]) }}>
    {{ $slot }}
</a>
@else
<div {{ $attributes->merge([
    'class' => 'flex items-center block px-4 py-2 text-sm leading-5 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none focus:bg-gray-100 transition duration-150 ease-in-out'
]) }}>
    {{ $slot }}
</div>
@endif