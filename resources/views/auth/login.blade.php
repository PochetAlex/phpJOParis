<x-guest-layout>

    <div class="wrap">
        <form class="login-form" action="{{route('login')}}" method="post">
            @csrf
            <div class="form-header">
                <h3>Connexion</h3>
                <p>Accès au dashboard</p>
            </div>
            <!--Email Input-->
            <div class="form-group">
                <input type="text" name="email" class="form-input" placeholder="email@example.com">
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="password" name="password" class="form-input" placeholder="password">
            </div>
            <div class="form-group remember">
                <label for="remember">Remember</label>
                <input type="checkbox" name="remember" id="remember" class="form-input">
            </div>
            <!--Login Button-->
            <div class="form-group">
                <button class="form-button" type="submit">Login</button>
            </div>
            <div class="form-footer">
                <a href="{{route('register')}}">Créez un compte</a>
            </div>
        </form>
    </div>


</x-guest-layout>
