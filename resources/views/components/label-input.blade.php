@props([
    'name',
    'label',
    'type',
    'required' => false
])

<div {!! $attributes->class([]) !!}>
    <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}" class="bg-gray-200 rounded-xs">
    <label for="{{ $name }}">{{ $label }} {!! ($required) ? "<small>(Requis)</small>" : '' !!}:</label>
    @if($type !== 'checkbox')
        @error($name)
        <p class="text-red-500">{!! $message !!}</p>
        @enderror
    @endif
</div>
