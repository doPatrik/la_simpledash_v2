<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon"><ion-icon name="stats-chart"></ion-icon></span>
                <span class="title">SimpleDash</span>
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="title">Dashboard</span>
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="receipt-outline"></ion-icon></span>
                <span class="title">Új számla</span>
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="card-outline"></ion-icon></span>
                <span class="title">Befizetés</span>
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="wallet-outline"></ion-icon></span>
                <span class="title">Kiadások</span>
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="layers-outline"></ion-icon></span>
                <span class="title">Szolgáltatók</span>
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="stats-chart-outline"></ion-icon></span>
                <span class="title">Áttekintés</span>
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
                <span class="title">Naptár</span>
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon"><ion-icon name="person-outline"></ion-icon></span>
                <span class="title">Profil</span>
            </a>
        </li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{route('logout')}}"
                   onclick="event.preventDefault();
                                            this.closest('form').submit();">
                    <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                    <span class="title">Kijelentkezés</span>
                </a>
            </form>
        </li>
    </ul>
</div>
