<nav>
    <div class="flex justify-end">
        <ul class="flex gap-2 text-1xl">
            <li><a class="text-blue-500" href="{{ route('jiris.index') }}">Jiris</a></li>
            <li><a class="text-blue-500" href="{{ route('contacts.index') }}">Contacts</a></li>
            <x-auth.logout></x-auth.logout>
        </ul>
    </div>
</nav>
