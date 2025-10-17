<form action="{{ $action }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-500">{{$text}}</button>
</form>
