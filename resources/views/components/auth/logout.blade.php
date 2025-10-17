<form action="{{ route('logout') }}" method="post">
    @csrf
    <button type="submit" class="text-red-500">Se déconnecter</button>
</form>
