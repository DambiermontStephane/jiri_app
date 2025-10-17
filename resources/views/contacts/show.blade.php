<x-layouts.app>
    <section class="flex flex-col justify-center items-center h-screen shadow-lg">
        <h1 class="text-center text-3xl font-bold mb-8 text-gray-800">Information de {{ $contact->name }}</h1>
        <div class="flex justify-center items-center flex-col">
            <div class="flex flex-col gap-4 bg-white shadow-lg rounded-2xl p-6 w-full max-w-md text-gray-800">

                @if($contact->avatar == null)
                    <p class="text-gray-400 italic text-center">Aucun avatar disponible</p>
                @else
                    <img
                        class="w-50 h-50 object-cover rounded-full mx-auto border-4 border-indigo-500 shadow-md aspect-auto"
                        src="{{ asset('storage/' . $contact->avatar) }}"
                        alt="Avatar de {{ $contact->name }}">
                @endif

                <div class="flex flex-col text-center mt-4">
                    <p class="text-gray-500 text-sm">Adresse e-mail:</p>
                    <p class="font-medium text-lg">{{ $contact->email }}</p>
                </div>

                <div class="flex flex-col text-center">
                    <p class="text-gray-500 text-sm">Numéro de téléphone:</p>
                    <p class="font-medium text-lg">
                    @if($contact->tel == null)
                        <p class="text-gray-400 italic text-center">Aucun numéro spécifé</p>
                        @else
                            {{ $contact->tel }}
                        @endif
                </div>
                    <div class="flex justify-between border-t mt-2 p-1">
                        <x-destroy action="{{ route('contacts.destroy', compact('contact')) }}" text="Supprimer"></x-destroy>
                        <a href="{{ route('contacts.edit', compact('contact')) }}">Éditer</a>
                    </div>
            </div>
        </div>
    </section>
</x-layouts.app>
