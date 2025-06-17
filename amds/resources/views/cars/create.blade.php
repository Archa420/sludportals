@extends('layouts.app')

@section('body_id', 'sludinajumi')

@section('content')
<div class="kopa">
    <h1>Pievienot Sludinājumu</h1>

    @if ($errors->any())
        <ul style="color: pink;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('cars.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="input-box">
            <input type="text" name="title" placeholder="Nosaukums" value="{{ old('title') }}" required>
        </div>

        <div class="input-box">
            <textarea name="description" placeholder="Apraksts" rows="4" required>{{ old('description') }}</textarea>
        </div>

        <div class="input-box">
            <input type="file" name="image" accept="image/*">
        </div>

        <button type="submit" class="btn">Pievienot</button>
    </form>
</div>
@endsection
