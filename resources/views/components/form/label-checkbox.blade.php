@props([
    'id',
    'name',
    'label'
])

<div {!! $attributes->class([]) !!}>
    <input type="checkbox" id="{{$id}}" name="{{$name}}">
    <label for="{{$id}}">{{$label}}</label>
    @error($name)
    <p class="text-red-500">{!! $message !!}</p>
    @enderror
</div>
