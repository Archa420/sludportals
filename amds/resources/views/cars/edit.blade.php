@extends('layouts.app')

@section('body_id', 'create_car')

@section('content')
    <h2>Pievienot jaunu sludinājumu</h2>
    <form action="{{ route('cars.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Nosaukums" required>
        <textarea name="description" placeholder="Apraksts"></textarea>
        <img id="preview" src="#" alt="Preview" style="display:none; width:100%; max-height:200px; margin-top:10px;">

        <input type="file" name="image">
        <button type="submit" class="btn">Saglabāt</button>
    </form>
@endsection
