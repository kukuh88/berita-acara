@extends('layouts.main')

@section('home')
    <h1 class="mb-3 text-center">{{ $title }}</h1>

    {{-- Bagian Search --}}
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/posts">

                {{-- bagian request dan bisa di tambah nama nama category dan author dia bertimpa --}}
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif


                {{-- Bagian Search --}}
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-danger" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    {{-- bagian Gambar Besar  --}}
    @if ($posts->count())
        <div class="card mb-3">

            {{-- jika ada gambarnya maka akan di ambil dari gambar yang di upload --}}
            @if ($posts[0]->image)
                <div style="max-height: 400px; overflow:hidden; ">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" alt="{{ $posts[0]->category->name }}"
                        class="img-fluid ">
                </div>
            @else
                {{-- jika gambar kosong ambil dari unsplesh --}}
                <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}" class="card-img-top"
                    alt="{{ $posts[0]->category->name }}">
            @endif



            <div class="card-body text-center ">

                <h3 class="card-title">

                    <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a>
                </h3>


                <small class="text-muted">
                    <p>By. <a href="/posts?author={{ $posts[0]->author->username }}"
                            class="text-decoration-none">{{ $posts[0]->author->name }}</a>
                        in
                        <a href="/posts?category={{ $posts[0]->category->slug }}"
                            class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                        {{ $posts[0]->created_at->diffForHumans() }}
                </small>
                </p>


                <p class="card-text">{{ $posts[0]->excerpt }}</p>

                <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-primary">Read More..</a>

            </div>
        </div>



        {{-- Tempat Bagian Kolom Untuk yang kecil kecil --}}
        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-3">
                        <div class="card">

                            {{-- membuat label pada gambar sebelah kiri atas --}}
                            <div class="position-absolute px-2 py-1 " style="background-color: rgb(0, 0, 0, 0.4) ">
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="text-white text-decoration-none">
                                    {{ $post->category->name }}</a>
                            </div>
                            {{-- jika ada gambar maka ambil dari hasil yang diupload --}}
                            @if ($post->image)
                                <div style="max-height: 350px; overflow:hidden; ">
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                                        class="img-fluid">
                                </div>
                            @else
                                {{-- jika gambar kosong --}}
                                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                                    class="card-img-top" alt="{{ $post->category->name }}">
                            @endif


                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                {{-- isi dalamnya  --}}
                                <p>By. <a href="/posts?author={{ $post->author->username }}"
                                        class="text-decoration-none">{{ $post->author->name }}</a>
                                    {{ $post->created_at->diffForHumans() }}
                                    </small>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">ADUH.. MAAF NIH YANG KAMU CARI ADANYA CEWEK CANTIK NIH 😪</p>
    @endif

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>

@endsection
