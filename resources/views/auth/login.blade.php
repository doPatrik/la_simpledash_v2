<x-guest-layout>
    <div class="imageContainer">
        <img src="/images/login_cover.jpg" alt="bejelentkezés">
    </div>
    <div class="loginContainer">
        <div class="formContainer">
            <h2>Bejelenetkezés</h2>
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="inputBox userName">
                    <div class="icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="inputContainer">
                        <h5>E-mail</h5>
                        <input type="text" class="input" name="email" required autocomplete="off">
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
                <div class="remember">
                    <div>
                        <label><input id="remember_me" type="checkbox" name="remember"> Emlékezz rám</label>
                    </div>

                    <a href="{{route('register')}}">Regisztráció</a>
                </div>
                <div>
                    <input type="submit" class="submit" value="Bejelentkezés">
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
