<x-layouts.app>
    <h1 class="text-2xl font-bold mb-3">Liste de vos contacts</h1>
    <div class="flex flex-col">
        @foreach($contacts as $contact)
            <a class="text-blue-500" href="{{ route('contacts.show', $contact->id) }}">{!! $contact->name !!}</a>
        @endforeach
    </div>
    <a class="text-blue-500" href="{{ route('contacts.create') }}">{{__('create_button.create_a_contact')}}</a>
</x-layouts.app>
