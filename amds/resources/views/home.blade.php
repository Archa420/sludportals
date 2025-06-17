@extends('layouts.app')

@section('body_id', 'homepage')

@section('content')
    <div class="container">
        <h2 class="section-title">Jaunākie Sludinājumi</h2>

        <div class="car-grid">
            @forelse ($cars as $car)
                <div class="car-card">
                    @if ($car->image)
                        <img src="{{ asset('storage/' . $car->image) }}" alt="Auto bilde">
                    @endif

                    <h3 class="car-title">{{ $car->title }}</h3>
                    <p class="car-description">{{ $car->description }}</p>

                    <a href="{{ route('cars.index') }}" class="btn-outline">Skatīt visus</a>
                </div>
            @empty
                <p>Nav pievienotu sludinājumu.</p>
            @endforelse
        </div>
    </div>
@endsection
