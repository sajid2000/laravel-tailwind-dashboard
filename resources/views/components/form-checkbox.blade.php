@props(['label' => ''])

<label class="flex items-center dark:text-gray-200">
    <x-input-checkbox {{ $attributes }}  />
    <span class="ml-2"> {{ $label }} </span>
</label>