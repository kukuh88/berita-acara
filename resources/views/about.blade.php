@extends('layouts.main')

@section('home')
    <h1>SELAMAT DATANG DI WA BLEST</h1>
    <h3>{{ $nama }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="{{ $nama }}" width="200" class="img-thumbnail rounded-circle">
@endsection
