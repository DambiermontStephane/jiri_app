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
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body class="max-h-dvh">
    <header>
        @auth
            <x-nav.main></x-nav.main>
        @endauth
    </header>
    <main>
        {{ $slot }}
    </main>
</body>
</html>
