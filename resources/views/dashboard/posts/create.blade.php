@extends('dashboard.layouts.main')

@section('home')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Posts</h1>
    </div>

    {{-- isi dalam sebuah form untuk mengisi --}}
    <div class="col-lg-8">
        <form method="post" action="/dashboard/posts" class="mb-5" enctype="multipart/form-data">
            @csrf
            {{-- bagian title --}}
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                    name="title" required autofocus value="{{ old('title') }}">

                {{-- bagian kesalahan pada penginputan --}}
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- bagian Slug --}}
            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                    readonly required value="{{ old('slug') }}">

                {{-- bagian kesalahan pada penginputan --}}
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- bagain dropdown Category --}}
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select @error('category') is-invalid @enderror" name="category_id">

                    {{-- bagian jika ada ada kesalahan dalam penginputan  --}}
                    @foreach ($categories as $category)
                        @if (old('category_id') == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>

            </div>

            {{-- bagian upload image --}}
            <div class="mb-3">
                <label for="image" class="form-label">Post Image</label>
                {{-- untuk menampilkan gambar dari javascript --}}
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                    {{-- mencetak atau proses pengecekan gambar --}} name="image" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- bagian body untuk isi karatket atau naskah atau isi cerita --}}
            <div class="mb-3">
                <label for="body" class="form-label @error('body') is-invalid @enderror">Body</label>

                {{-- bagian error jika salah input --}}
                @error('body')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                <trix-editor input="body"></trix-editor>

            </div>


            <a href="/dashboard/posts" class="btn btn-success"> <span data-feather="arrow-left"></span> Back To
                Dashboard</a>
            <button type="submit" class="btn btn-primary md-3">Create Post</button>



        </form>
    </div>

    {{-- bagian WEB UNPAS  --}}
    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/checkSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })

        // bagian javasricpt untuk menampilkan gambar
        function previewImage() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>

    {{-- bagian sederhana dari Komentar --}}
    {{-- <script>
        const title = document.querySelector("#title");
        const slug = document.querySelector("#slug");

        title.addEventListener("keyup", function() {
            let preslug = title.value;
            preslug = preslug.replace(/ /g, "-");
            slug.value = preslug.toLowerCase();
        });

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault();
        })
    </script> --}}
@endsection
