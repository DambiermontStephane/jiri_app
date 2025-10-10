@props([
    'name',
    'label',
    'type',
    'required' => false
])

<div {!! $attributes->class(["flex flex-col gap-1 w-full"]) !!}>
    <div class="flex flex-col">
        <label for="{{ $name }}" class="mb-2">{{ $label }} {!! ($required) ? "<small>(Requis)</small>" : '' !!}:</label>
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}" class="border-2 border-gray-200 shadow rounded-sm h-10">
    </div>
    @if($type !== 'checkbox')
        @error($name)
        <p class="text-red-500">{!! $message !!}</p>
        @enderror
    @endif
</div>
