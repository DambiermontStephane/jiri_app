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
<body>
<h1>{!!__('headings.create_a_jiri')!!}</h1>
<form action="{{ route('jiris.store') }}" method="post">
    @csrf
    <div>
        <div>
            <p>Information du jiri</p>
            <x-label-input name="name" type="text" label="Nom" required></x-label-input>
            <x-label-input name="date" type="date" label="Date" required></x-label-input>
            <x-label-input name="description" type="text" label="Description"></x-label-input>
        </div>
        <div>
            <div>
                <p>Ajoutez des contacts</p>
                <div class="flex">
                    <x-label-input name="name" type="checkbox" label="Bruno"></x-label-input>
                    <select name="role" id="role_select">
                        <option value="role">Rôle</option>
                        <option value="student">Étudiant</option>
                        <option value="evaluator">Evaluateur</option>
                    </select>
                </div>
                <div>
                    <x-label-input name="name" type="checkbox" label="Bruno"></x-label-input>
                    <select name="role" id="role_select">
                        <option value="role">Rôle</option>
                        <option value="student">Étudiant</option>
                        <option value="evaluator">Evaluateur</option>
                    </select>
                </div>
                <div>
                    <x-label-input name="name" type="checkbox" label="Pruneau"></x-label-input>
                    <select name="role" id="role_select">
                        <option value="role">Rôle</option>
                        <option value="student">Étudiant</option>
                        <option value="evaluator">Evaluateur</option>
                    </select>
                </div>
                <div>
                    <x-label-input name="name" type="checkbox" label="Bruno"></x-label-input>
                    <select name="role" id="role_select">
                        <option value="role">Rôle</option>
                        <option value="student">Étudiant</option>
                        <option value="evaluator">Evaluateur</option>
                    </select>
                </div>
                <div>
                    <x-label-input name="name" type="checkbox" label="Bruno"></x-label-input>
                    <select name="role" id="role_select">
                        <option value="role">Rôle</option>
                        <option value="student">Étudiant</option>
                        <option value="evaluator">Evaluateur</option>
                    </select>
                </div>
            </div>
        </div>
        <div>
            <p>Vos projets</p>
            <div>
                <x-label-input name="cv" type="checkbox" label="CV"></x-label-input>
                <input type="number" id="cv" name="cv">
            </div>
            <div>
                <x-label-input name="portfolio" type="checkbox" label="Portfolio"></x-label-input>
                <input type="number" id="portfolio" name="portfolio">
            </div>
            <div>
                <x-label-input name="site_client" type="checkbox" label="Site Client"></x-label-input>
                <input type="number" id="site_client" name="site_client">
            </div>
        </div>
    </div>
    <button type="submit">{{__('labels_buttons.create_a_jiri')}}</button>
</form>
</body>
</html>
