<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMDS.LV</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body id="@yield('body_id')">

    @include('partials.header')

    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script>
        // Theme toggle function
        function toggleMode() {
            document.body.classList.toggle('light-mode');
            localStorage.setItem('theme', document.body.classList.contains('light-mode') ? 'light' : 'dark');
        }

        // Load theme on page load
        window.addEventListener('DOMContentLoaded', () => {
            if (localStorage.getItem('theme') === 'light') {
                document.body.classList.add('light-mode');
            }
        });

        // Dropdown logic
        function toggleDropdown(trigger) {
            const menu = trigger.parentElement.querySelector('.dropdown-menu');
            menu.classList.toggle('show');

            // Close other open dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(el => {
                if (el !== menu) el.classList.remove('show');
            });
        }

        // Hide dropdown on outside click
        document.addEventListener('click', function (e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown-menu').forEach(el => el.classList.remove('show'));
            }
        });
    </script>
</body>
</html>
