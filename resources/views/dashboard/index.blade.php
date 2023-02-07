@extends('dashboard.layouts.main')


@section('home')
    <div class="row justify-content-center mb-5" style="max-height: 350px; ">
        <h1 class="h2">Walcome Back, {{ auth()->user()->name }} Semoga Hari Kamu Menyenangkan Silakan Berdoa Terlebih
            Dahulu Seblum
            Memulai Aktivitas Hari Ini Ya Semangat :) </h1>
        <br>
        <img src="img/salib.jpg" alt="https://inventaris-it.ptdak.co.id/">
    </div>
@endsection
