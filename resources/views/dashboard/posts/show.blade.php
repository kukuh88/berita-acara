@extends('dashboard.layouts.main')


@section('home')
    <div class="container">
        <div class="row my-3">
            <div class="col-lg-8">
                <h1 class="mb-2">{{ $post->title }}</h1>

                {{-- bagian back ke halaman depan --}}
                <a href="/dashboard/posts" class="btn btn-success"> <span data-feather="arrow-left"></span> Back To My
                    Posts</a>

                {{-- bagian edit --}}
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"> <span data-feather="edit"></span>
                    Edit</a>

                {{-- bagian delete --}}
                <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Yakin Mau Hapus Datanya')">
                        <span data-feather="x-circle"></span> Dalate
                    </button>
                </form>


                {{-- bagian image untuk mengatur jika ada foto maka akan di tampilkan jika tidak ada akan di ambil dari link unsplash --}}
                @if ($post->image)
                    <div style="max-height: 350px; overflow:hidden; ">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}"
                            class="img-fluid mt-3">
                    </div>
                @else
                    {{-- jika gambar kosong --}}
                    <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                        alt="{{ $post->category->name }}" class="img-fluid mt-3">
                @endif



                <article class="my-3">

                    {{-- //mencetak PHP ECHO kalau ada tag HTML dia Langsung Skip
        {{ $post->body }}
        ///mencetak PHP ECHO kalau ada tag HTML dia Langsung Skip --}}
                    {!! $post->body !!}

                </article>

            </div>
        </div>
    </div>
@endsection
