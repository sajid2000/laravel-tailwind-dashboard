@props(['label'])

<div class="my-4">
    <label class="font-medium text-sm text-gray-700 mb-2 dark:text-gray-200">
        {{ $label }}
        <x-input-select {{ $attributes }}>{{ $slot }}</x-input-select>
    </label>

    <x-form-field-error name="{{ $attributes->get('name') }}" />
</div>