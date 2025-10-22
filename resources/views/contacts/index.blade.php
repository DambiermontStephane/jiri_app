<x-layouts.app>
    <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Liste des jiris</h1>

    <div class="flex flex-col gap-3 bg-white shadow-md rounded-2xl p-6 max-w-lg mx-auto">
        @foreach($contacts as $contact)
            <a
                href="/contacts/{!! $contact->id !!}"
                class="px-4 py-2 rounded-lg bg-gray-100 hover:bg-blue-100 hover:text-blue-700 transition duration-200 text-gray-700 font-medium text-center"
            >
                {!! $contact->name !!}
            </a>
        @endforeach
    </div>

    <a href="{{ route('contacts.create') }}" class="mt-6 inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200 mx-auto text-center w-fit">{{ __('create_button.create_a_contact') }}</a>
</x-layouts.app>
