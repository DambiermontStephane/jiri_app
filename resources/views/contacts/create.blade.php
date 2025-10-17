<x-layouts.app>
    <section class="flex flex-col justify-center items-center h-screen">
        <div class="shadow-2xl p-5 rounded-2xl border-2 border-gray-200">
            <h1 class="text-center text-2xl font-bold mb-5">{{__('headings.create_a_contact')}}</h1>
            <form action="{{ route('contacts.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col justify-center items-center w-80">
                    <x-form.label-input name="name" type="text" label="Nom" required placeholder="Nom du contact"></x-form.label-input>
                    <x-form.label-input name="email" type="email" label="E-mail" required placeholder="john@doe.com"></x-form.label-input>
                    <x-form.label-input name="tel" type="phone" label="Téléphone" placeholder="0493789322"></x-form.label-input>
                    <x-form.label-input name="avatar" type="file" label="Avatar"></x-form.label-input>
                </div>
                <button type="submit" class="text-white bg-blue-500 rounded-sm p-2 w-full mt-5">Ajouter</button>
            </form>
        </div>

    </section>
</x-layouts.app>
