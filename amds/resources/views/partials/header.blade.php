<header class="site-header">
    <div class="logo">
        <a href="{{ route('home') }}" class="Name">AMDS.LV</a>
    </div>

    <nav class="navbar">
        <ul>
            <li><a href="{{ route('home') }}">Sākums</a></li>
            <li><a href="{{ route('cars.index') }}">Sludinājumi</a></li>

            @auth
                <li class="dropdown" style="position: relative;">
                    <a href="#" onclick="event.preventDefault(); toggleDropdown(this);">
                        Mans Profils ▾
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile.edit') }}">Rediģēt profilu</a></li>
                        <li><a href="{{ route('my.listings') }}">Mani sludinājumi</a></li>
                    </ul>
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-button">Iziet</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Pieteikties</a></li>
                <li><a href="{{ route('register') }}">Reģistrēties</a></li>
            @endauth
        </ul>
    </nav>

    <div class="header-actions">
        <button onclick="toggleMode()" class="mode-toggle">🌙 / ☀️</button>

        <form action="{{ route('cars.index') }}" method="GET" class="search-form">
            <input type="text" name="search" placeholder="Meklēt" class="search-input">
        </form>

        @auth
            <a href="{{ route('cars.create') }}" class="btn-outline small">+ Pievienot Sludinājumu</a>
        @endauth
    </div>
</header>
