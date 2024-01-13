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

<nav>
    <div>
        <a href="{{ route('home') }}">Home</a>
    </div>
    <div>
        @auth
            <div class="in-menu">
                Bonjour {{ Auth::user()->name }}
            </div>
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

{{ $slot }}


<script>
    document.getElementById('logout').addEventListener("click", (event) => {
        document.getElementById('logout-form').submit();
    });
</script>
</body>
</html>
