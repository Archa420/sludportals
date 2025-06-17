@extends('layouts.auth')

@section('content')
<div class="kopa">
    <h1>Reģistrēties</h1>

    @if ($errors->any())
        <ul style="color: pink;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="input-box">
            <input type="text" name="name" placeholder="Vārds" value="{{ old('name') }}" required>
        </div>

        <div class="input-box">
            <input type="email" name="email" placeholder="E-pasts" value="{{ old('email') }}" required>
        </div>

        <div class="input-box">
            <input type="password" name="password" placeholder="Parole" required>
        </div>

        <div class="input-box">
            <input type="password" name="password_confirmation" placeholder="Atkārtot paroli" required>
        </div>

        <button type="submit" class="btn-outline">Reģistrēties</button>

        <div class="Registration-link">
            <p>Jau ir konts? <a href="{{ route('login') }}">Pieslēgties</a></p>
        </div>
    </form>
</div>
@endsection
