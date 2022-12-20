@extends('layouts.landingPage.main')
@section('content')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Buat Portofolio</h1>
                        <p class="text-white">Isi Portofolio yang anda miliki</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="card my-5 shadow" style="border-radius: 20px">
                <div class="card-body">
                    <h3>Upload Portofolio</h3>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade mt-3 show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-12">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                    <form action="/create-portofolio" method="POST" class="mb-5"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text"
                                                class="form-control form-control-lg @error('title') is-invalid
                                        @enderror"
                                                id="title" name="title" required autofocus
                                                value="{{ old('title') }}">
                                            @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="link" class="form-label">Link</label>
                                            <input type="text"
                                                class="form-control form-control-lg @error('link') is-invalid
                                        @enderror"
                                                id="link" name="link" required autofocus
                                                value="{{ old('link') }}">
                                            @error('link')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <img class="img-preview img-fluid mb-3 col-sm-5" style="border-radius: 20px">
                                            <input name="image"
                                                class="form-control   @error('image') is-invalid
                                        @enderror"
                                                type="file" id="image" onchange="previewImage()">
                                            @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="editor1" class="form-label">Deskripsi</label>
                                            @error('editor1')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                            <textarea class="form-control" id="message" cols="30" rows="5" name="editor1"></textarea>

                                        </div>

                                        <button type="submit" class="btn btn-primary">Tambah Portofolio</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
    <script>
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

        document.addEventListener('trix-file-accept', function(e) {
            e.preventDefault()
        })
    </script>
@endsection
