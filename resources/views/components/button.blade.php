@props(['href' => false, 'title' => $slot])
@if($href === false)
<button {{ $attributes->merge([
    'type' => 'button',
    'class' => 'bg-gray-900 text-white border border-transparent font-semibold tracking-widest uppercase text-xs px-4 py-2 rounded shadow-xl outline-none ease-linear transition-all duration-150 disabled:opacity-25 ring-blue-600 focus:ring hover:shadow-md hover:bg-gray-700 active:bg-gray-900'
]) }}>
    {{ $title }}
</button>
@else
<a href="{{ $href }}" {{ $attributes->merge([
    'class' => 'inline-block bg-gray-900 text-white border border-transparent font-semibold tracking-widest uppercase text-xs px-4 py-2 rounded shadow-xl outline-none ease-linear transition-all duration-150 disabled:opacity-25 ring-blue-600 focus:ring hover:shadow-md hover:bg-gray-700 active:bg-gray-900',
]) }}>
    {{ $title }}
</a>
@endif