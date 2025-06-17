<header class="site-header">
    <div class="logo">
        <a href="/" class="Name">AMDS.LV</a>
    </div>

    <nav class="navbar">
        <ul>
            <li><a href="/">Sākums</a></li>
            <li><a href="/sludinajumi">Sludinājumi</a></li>

            <!-- Dropdown -->
            <li class="dropdown" style="position: relative;">
                <a href="#" class="dropdown-toggle" onclick="event.preventDefault(); toggleDropdown(this);">
                    Mans Profils ▾
                </a>
                <ul class="dropdown-menu">
                    <li><a href="/profile">Rediģēt profilu</a></li>
                    <li><a href="/my-listings">Mani sludinājumi</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="logout-button">Iziet</button>
                        </form>
                    </li>
                </ul>
            </li>

            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="logout-button">Iziet</button>
                </form>
            </li>
        </ul>
    </nav>

    <div class="header-actions">
        <button onclick="toggleMode()" class="mode-toggle">🌙 / ☀️</button>

        <form action="/search" method="GET" class="search-form">
            <input type="text" name="q" placeholder="Meklēt" class="search-input">
        </form>

        <a href="/cars/create" class="btn-outline small">+ Pievienot Sludinājumu</a>
    </div>
</header>
