@extends('layouts.auth')

@section('content')
<div class="auth-wrapper">
    <div class="kopa">
        <h1>Pieteikties</h1>

        {{-- Session success message --}}
        @if (session('status'))
            <p style="color: lightgreen;">{{ session('status') }}</p>
        @endif

        {{-- Error messages --}}
        @if ($errors->any())
            <ul style="color: pink;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-box">
                <input 
                    type="email" 
                    name="email" 
                    placeholder="E-pasts" 
                    value="{{ old('email') }}" 
                    required 
                    autofocus>
            </div>

            <div class="input-box">
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Parole" 
                    required>
            </div>

            <div class="remember-forgot" style="margin: 10px 0;">
                <label>
                    <input type="checkbox" name="remember"> Atcerēties mani
                </label>
            </div>

            <button type="submit" class="btn-outline">Ieiet</button>

            <div class="Registration-link" style="margin-top: 20px;">
                <p>Nav konta? <a href="{{ route('register') }}">Reģistrēties</a></p>
            </div>
        </form>
    </div>
</div>
@endsection
