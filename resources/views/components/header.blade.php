<div>
    <button><a href="{{route('home')}}">🏛 Accueil</a></button>
    <button><a href="{{route('aPropos')}}">❔A propos</a></button>
    <button><a href="{{route('contacts')}}">☎️ Contacts</a></button>
    @auth
        <button><a href="{{route('sports.index')}}">Sports</a></button>
    @endauth

</div>
<span class="a-droite"></span>
@guest
    <div>
        <button><a href="{{route('register')}}">📥 Enregistrement</a></button>
        <button><a href="{{route('login')}}">😎 Connexion</a></button>
    </div>
@endguest
@auth
    <div>
        {{Auth::user()->name}}
        <button><a href="#" id="logout">Logout</a>
        </button>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <script>
        document.getElementById('logout').addEventListener("click", (event) => {
            document.getElementById('logout-form').submit();
        });
    </script>
@endauth
