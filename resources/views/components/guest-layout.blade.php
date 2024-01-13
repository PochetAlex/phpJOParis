<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased">
<div class="main-container">

    <div class="menu">
        <nav>
            <div>
                <a href="{{ route('accueil') }}">Accueil</a>
            </div>
            <div>
                @auth
                    <a href="#" id="logout">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                @else
                    <a href="{{ route('login') }}">Connexion</a>
                    <a href="{{ route('register') }}">Enregistrement</a>
                @endauth
            </div>
        </nav>
    </div>
    @if($errors->isNotEmpty() )
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
    @endif
    <div>
        {{ $slot }}
    </div>
    <x-footer></x-footer>
</div>

@auth
    <script>
        document.getElementById('logout').addEventListener("click", (event) => {
            document.getElementById('logout-form').submit();
        });
    </script>
@endauth
</body>
</html>
