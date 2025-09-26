<!doctype html>
<html lang="{!! app()->getLocale() !!}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <title>{!!__('headings.create_a_jiri')!!}</title>
</head>
<body class="px-4 py-6">
<h1 class="text-2xl font-bold mb-5 text-center">{!!__('headings.create_a_jiri')!!}</h1>
<form action="{{ route('jiris.store') }}" method="post" class="flex flex-col flex-1 justify-center items-center">
    @csrf
    <div class="flex flex-1 gap-10 justify-center">
        <div class="flex flex-col">
            <p class="font-bold">Information du jiri</p>
            <x-label-input name="name" type="text" label="Nom" required class="flex flex-row-reverse"></x-label-input>
            <x-label-input name="date" type="date" label="Date" required class="flex flex-row-reverse"></x-label-input>
            <x-label-input name="description" type="text" label="Description" class="flex flex-row-reverse"></x-label-input>
        </div>
        <div class="flex flex-col gap-2">
            <div class="border-l-2 border-black pl-10">
                <p class="font-bold">Ajoutez des contacts</p>
                <div class="flex">
                    <x-label-input name="name" type="checkbox" label="Bruno"></x-label-input>
                    <select name="role" id="role_select">
                        <option value="role">Rôle</option>
                        <option value="student">Étudiant</option>
                        <option value="evaluator">Evaluateur</option>
                    </select>
                </div>
                <div class="flex">
                    <x-label-input name="name" type="checkbox" label="Bruno"></x-label-input>
                    <select name="role" id="role_select">
                        <option value="role">Rôle</option>
                        <option value="student">Étudiant</option>
                        <option value="evaluator">Evaluateur</option>
                    </select>
                </div>
                <div class="flex">
                    <x-label-input name="name" type="checkbox" label="Bruno"></x-label-input>
                    <select name="role" id="role_select">
                        <option value="role">Rôle</option>
                        <option value="student">Étudiant</option>
                        <option value="evaluator">Evaluateur</option>
                    </select>
                </div>
                <div class="flex">
                    <x-label-input name="name" type="checkbox" label="Bruno"></x-label-input>
                    <select name="role" id="role_select">
                        <option value="role">Rôle</option>
                        <option value="student">Étudiant</option>
                        <option value="evaluator">Evaluateur</option>
                    </select>
                </div>
                <div class="flex">
                    <x-label-input name="name" type="checkbox" label="Bruno"></x-label-input>
                    <select name="role" id="role_select">
                        <option value="role">Rôle</option>
                        <option value="student">Étudiant</option>
                        <option value="evaluator">Evaluateur</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="border-l-2 border-black pl-10">
            <p class="font-bold">Vos projets</p>
            <div class="flex gap-20">
                <x-label-input name="cv" type="checkbox" label="CV"></x-label-input>
                <input type="number" id="cv" name="cv">
            </div>
            <div class="flex gap-20">
                <x-label-input name="portfolio" type="checkbox" label="Portfolio"></x-label-input>
                <input type="number" id="portfolio" name="portfolio">
            </div>
            <div class="flex gap-20">
                <x-label-input name="site_client" type="checkbox" label="Site Client"></x-label-input>
                <input type="number" id="site_client" name="site_client">
            </div>
        </div>
    </div>
    <button type="submit"
            class="bg-gray-200 rounded-xs px-1.5 py-1 mt-5 hover:bg-black w-25">{{__('labels_buttons.create_a_jiri')}}</button>
</form>
</body>
</html>
