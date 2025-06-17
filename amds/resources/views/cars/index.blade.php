@extends('layouts.app')

@section('body_id', 'sludinajumi')

@section('content')
<div class="search-container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 20px;">
    <form method="GET" action="{{ route('cars.index') }}" style="flex-grow: 1; display: flex; gap: 10px; align-items: center; height: 42px;">
        <input type="text" name="search" placeholder="Meklēt sludinājumu..." value="{{ request('search') }}" class="search-input" style="flex-grow: 1; height: 100%;">
        <button type="submit" class="btn-outline small" style="height: 100%;">Meklēt</button>
    </form>

    @auth
        <a href="{{ route('cars.create') }}" class="btn-outline small" style="white-space: nowrap; height: 42px; display: flex; align-items: center; justify-content: center;">+ Pievienot Sludinājumu</a>
    @endauth
</div>

@if(session('success'))
    <div style="color: lightgreen; margin-bottom: 15px;">
        {{ session('success') }}
    </div>
@endif

<div class="car-grid">
    @forelse ($cars as $car)
        <div class="car-card">
            <h3>{{ $car->title }}</h3>
            <p>{{ $car->description }}</p>
            @if ($car->image)
                <img src="{{ asset('storage/' . $car->image) }}" alt="Car image">
            @endif
        </div>
    @empty
        <p style="text-align: center;">Nav atrastu sludinājumu.</p>
    @endforelse
</div>
@endsection
