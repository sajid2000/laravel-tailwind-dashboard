<div class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-gray-300 border-0">
    <div class="rounded-t mb-0 px-6 py-6">
        {{ $header }}
        <hr class="mt-6 border-b-1 border-gray-400" />
    </div>
    <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
        {{ $slot }}
    </div>
</div>