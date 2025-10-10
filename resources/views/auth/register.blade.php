<x-layouts.app>
    <section class="flex justify-center items-center h-screen">
        <div class="shadow-2xl p-5 rounded-2xl border-2 border-gray-200">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#2c3e67" width="100" height="100" class="mx-auto">
                <path d="M12 2 1 7l11 5 9-4.09V17h2V7L12 2z"/>
                <path d="M4 10v6c0 2.21 3.58 4 8 4s8-1.79 8-4v-6l-8 3.64L4 10z"/>
            </svg>
            <h1 class="text-center text-2xl font-bold mb-5">Inscription à l'espace Jury</h1>
            <form action="{{ route('register.store') }}" method="post" class="flex flex-col items-center">
                @csrf
                <div class="flex content-center flex-col gap-5 items-center w-80">
                    <x-form.label-input name="name" type="text" label="Nom" required></x-form.label-input>
                    <x-form.label-input name="email" type="text" label="Adresse e-mail" required></x-form.label-input>
                    <x-form.label-input name="password" type="text" label="Mot de passe"></x-form.label-input>
                    <x-form.label-input name="pwd-repeat" type="text" label="Répéter le mot de passe"></x-form.label-input>
                    <div class="flex justify-between w-full">
                        <x-form.label-checkbox name="remember_me" id="remember_me" label="Se souvenir de moi"
                                               class="flex items-center justify-between text-sm gap-2"></x-form.label-checkbox>
                        <a href="#" class="text-blue-500 text-sm">Mot de passe oublié ?</a>
                    </div>
                    <button type="submit" class="text-white bg-blue-500 rounded-sm p-2 w-full">S'inscrire</button>
                </div>
            </form>
        </div>
    </section>
</x-layouts.app>
