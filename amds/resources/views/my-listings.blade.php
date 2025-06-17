@extends('layouts.app')

@section('body_id', 'my-listings')

@section('content')
<div class="container">
    <h1 class="section-title">Mani Sludinājumi</h1>

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
                <div style="margin-top: 10px; display: flex; gap: 10px;">
                    <a href="{{ route('cars.edit', $car) }}" class="btn-outline small">Rediģēt</a>
                    <form method="POST" action="{{ route('cars.destroy', $car) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-outline small" onclick="return confirm('Vai tiešām dzēst?')">Dzēst</button>
                    </form>
                </div>
            </div>
        @empty
            <p style="text-align: center;">Jums nav neviena sludinājuma.</p>
        @endforelse
    </div>
</div>
@endsection
