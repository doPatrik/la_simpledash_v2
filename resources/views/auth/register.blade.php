<x-guest-layout>
    <div class="imageContainer">
        <img src="/images/login_cover.jpg" alt="bejelentkezés">
    </div>
    <div class="loginContainer">
        <div class="formContainer">
            <h2>Regisztráció</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="inputBox userName">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="inputContainer">
                        <h5>Felhasználónév</h5>
                        <input type="text" class="input" name="name" value="{{ old('name') }}" required>
                    </div>
                </div>
                <div class="inputBox lastName">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="inputContainer">
                        <h5>Családnév</h5>
                        <input type="text" class="input" name="last_name" value="{{ old('last_name') }}" required>
                    </div>
                </div>
                <div class="inputBox firstName">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="inputContainer">
                        <h5>Keresztnév</h5>
                        <input type="text" class="input" name="first_name" value="{{ old('first_name') }}" required>
                    </div>
                </div>
                <div class="inputBox email">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="inputContainer">
                        <h5>E-mail</h5>
                        <input type="text" class="input" name="email" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="inputBox password">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="inputContainer">
                        <h5>Jelszó</h5>
                        <input type="password" class="input" name="password" required>
                    </div>
                </div>
                <div class="inputBox passwordConfirm">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="inputContainer">
                        <h5>Jelszó megerősítése</h5>
                        <input type="password" class="input" name="password_confirmation" required>
                    </div>
                </div>
                <div class="remember">
                    <a href="{{route('login')}}">Rendelkezem felhasználóval</a>
                </div>
                <div>
                    <input type="submit" class="submit" value="Regisztráció">
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
