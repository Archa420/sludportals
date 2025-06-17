@extends('layouts.app')

@section('body_id', 'profile')

@section('content')
<div class="kopa">
    <h1>Profils</h1>

    @if(session('success'))
        <p style="color: lightgreen">{{ session('success') }}</p>
    @endif

    <form method="POST" action="{{ route('profile.update') }}">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ $user->name }}" required>
        <input type="email" name="email" value="{{ $user->email }}" required>
        <button type="submit" class="btn">Saglabāt</button>
    </form>
</div>
@endsection