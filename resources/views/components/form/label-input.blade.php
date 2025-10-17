@props([
    'name',
    'label',
    'type',
    'placeholder' => false,
    'value' => false,
    'required' => false
])

<div {!! $attributes->class(["flex flex-col gap-1 w-full"]) !!}>
    <div class="flex flex-col">
        <label for="{{ $name }}" class="mb-2">{{ $label }} {!! ($required) ? "<small>(Requis)</small>" : '' !!}:</label>
        <input
            type="{{ $type }}"
            id="{{ $name }}"
            name="{{ $name }}"
            {{ $placeholder ? "placeholder=$placeholder" : "" }}
            {{ $value ? "value=$value" : "" }}
            class="border-2 border-gray-200 shadow rounded-sm h-10 pl-2">
    </div>
    @if($type !== 'checkbox')
        @error($name)
        <p class="text-red-500">{!! $message !!}</p>
        @enderror
    @endif
</div>
