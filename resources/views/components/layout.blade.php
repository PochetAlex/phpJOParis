<!doctype html>
<html lang={{ str_replace('_', '-', app()->getLocale()) }}>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>{{$titre ?? "Application Laravel"}}</title>
</head>
<body>
<menu>
    <x-header></x-header>
</menu>
<main>
    @if ($errors->any())
        <x-message-info titre="Information" :message="session('msg')">
            <div class="errors">
                <h3 class="titre-erreurs">Liste des erreurs</h3>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </x-message-info>
    @elseif(session('msg'))
        <x-message-info titre="Information" :message="session('msg')">
            <div class="succes">
                <h3 class="titre-succes">{{session('msg')}}</h3>
            </div>
        </x-message-info>
    @endif

    {{$slot}}
</main>
<footer>
    <x-footer></x-footer>
</footer>
</body>
</html>
