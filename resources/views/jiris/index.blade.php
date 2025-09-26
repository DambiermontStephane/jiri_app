<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Liste des jiris</h1>
    @foreach($jiris as $jiri)
        <a href="/jiris/{!! $jiri->id !!}">{!! $jiri->name !!}</a>
    @endforeach
<a href="{{ route('jiris.create') }}">{{ __('create_button.create_a_jiri') }}</a>
</body>
</html>
