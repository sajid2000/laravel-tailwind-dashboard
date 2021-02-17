@props(['name' => ''])

@error($name)
    <div {{ $attributes->merge(['class' => 'text-red-600 text-sm rounded mt-2']) }}>{{ $message }}</div>
@enderror