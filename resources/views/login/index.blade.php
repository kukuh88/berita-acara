@extends('layouts.main')

@section('home')
    <div class="row justify-content-center">
        <div class="col-md-4">

            {{-- bagian berhasil Dismissing --}}
            @if (session()->has('susccess'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- bagian berhasil Dismissing --}}
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-registration w-100 m-auto">
                <form action="/login" method="post">

                    {{-- untuk menjaga ke amanan --}}
                    @csrf
                    <img class="rounded mx-auto d-block mb-4" src="img/ptdak.png" alt="" width="150"
                        height="150">
                    <h1 class="d-block text-center h4 mb-3 fw-normal"> SILAKAN LOGIN </h1>


                    {{-- bagian Emailnya --}}
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" required autofocus value="{{ old('email') }}">
                        <label for="email">Email Address</label>
                        {{-- Bagian Error Ketika tidak di isi --}}
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Bagian Password --}}
                    <div class="form-floating">
                        <input type="password" name="password"
                            class="form-control rounded-bottom @error('password') is-invalid @enderror"
                            id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>
                        {{-- Bagian Error Ketika tidak di isi --}}
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">LOGIN</button>

                </form>
            </main>
            <small class="d-block text-center mt-4"> JIKA BELUM PUNYA AKUN SILAKAN DAFTAR KE <a href="/register"> IT Support
                </a></small>
        </div>
    </div>
@endsection
