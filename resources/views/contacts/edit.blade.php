<x-layouts.app>
    <section class="flex flex-col justify-center items-center h-screen">
        <div class="shadow-2xl p-5 rounded-2xl border-2 border-gray-200">
            <h1 class="text-center text-2xl font-bold mb-5">{{__('headings.edit_a_contact')}}</h1>
            <form action="{{ route('contacts.update', compact('contact')) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="flex flex-col justify-center items-center w-80">
                    <x-form.label-input name="name" type="text" label="Nom" required value="{{ $contact->name }}"></x-form.label-input>
                    <x-form.label-input name="email" type="email" label="E-mail" required value="{{ $contact->email }}"></x-form.label-input>
                    <x-form.label-input name="tel" type="phone" label="Téléphone" value="{{ $contact->tel }}"></x-form.label-input>
                    <x-form.label-input name="avatar" type="file" label="Avatar" value="{{ $contact->avatar }}"></x-form.label-input>
                </div>
                <button type="submit" class="text-white bg-blue-500 rounded-sm p-2 w-full mt-5">Confirmer</button>
            </form>
        </div>
    </section>
</x-layouts.app>
