@props(['title', 'icon', 'active' => false])

<li class="relative px-3 py-3">
    @if($active !== false)<span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg" aria-hidden="true"></span>@endif
    <a {{ $attributes->merge([
        'href' => '#',
        'class' => 'p-1 inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 outline-none ring-purple-600 rounded focus:ring-1 hover:text-gray-800 dark:hover:text-gray-200',
    ]) }}>
        <i class="{{ $icon }} w-5 h-auto"></i>
        <span class="ml-4">{{ $title }}</span>
    </a>
</li>
