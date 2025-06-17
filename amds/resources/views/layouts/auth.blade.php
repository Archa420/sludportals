<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <title>AMDS.LV – Autentifikācija</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <main class="auth-layout">
        @yield('content')
    </main>
</body>
</html>
