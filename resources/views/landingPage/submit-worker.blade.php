@extends('layouts.landingPage.main')
@section('content')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Submit Worker</h1>
                        <p class="text-white">Menampilkan list pengajuan pada worker</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="section-title text-center mb-3">My Project</h2>
                    <p>
                        Tuliskan secara detail tentang project yang ingin anda buat, agar para freelancer dapat memahami
                        project anda dengan baik.
                    </p>
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row justify-content-center p-3">
                <form class="contact-form bg-white" action="{{ route('processWorker') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <h3 class="mb-3">Data diri</h3>
                    <div class="row mb-3">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-black" for="fname">Name</label>
                                <input required type="text" class="form-control" id="fname" name="name"
                                    value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-black" for="fname">Email</label>
                                <input required type="text" class="form-control" id="fname" name="email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-black" for="fname">Gender</label>
                                <select name="gender" id="" class="custom-select">
                                    <option value="Laki-Laki" {{ Auth::user()->gander == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan" {{ Auth::user()->gander == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-black" for="fname">Phone</label>
                                <input required type="text" class="form-control" id="fname" name="phone"
                                    value="{{ Auth::user()->phone }}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-black" for="fname">Nomor Rekening</label>
                                <input required type="text" class="form-control" id="fname"
                                    value="{{ Auth::user()->bank_account }}" name="bank_account">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-black" for="fname">Skill</label>
                                <select class="js-example-basic-multiple select2-multiple form-control" name="skill[]"
                                    multiple="multiple">
                                    @foreach ($skills as $skill)
                                        <option value="{{ $skill->name }}">{{ $skill->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-black" for="message">Alamat</label>
                                <textarea id="basic-default-message" class="form-control" cols="10" rows="5" name="address">{{ Auth::user()->address }}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="text-black" for="message">About me</label>
                                <textarea id="basic-default-message" class="form-control" cols="10" rows="5" name="about">{{ Auth::user()->address }}</textarea>
                            </div>
                        </div>
                    </div>
                    <h3 class="mb-3">Upload File</h3>
                    <div class="row mb-3">
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="image" class="form-label">Profile</label>
                                <img class="img-preview img-fluid mb-3 col-sm-12 m-1" style="border-radius: 20px">
                                <input required name="photo"
                                    class="form-control   @error('image') is-invalid
                                                                                    @enderror"
                                    type="file" id="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="image" class="form-label">KTP</label>
                                <img class="img-preview-ktp img-fluid mb-3 col-sm-12 m-1" style="border-radius: 20px">
                                <input required name="ktp"
                                    class="form-control   @error('image') is-invalid
                                                                                    @enderror"
                                    type="file" id="ktp" onchange="previewImage3()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group">
                                <label for="image" class="form-label">CV</label>
                                <img class="img-preview-cv img-fluid mb-3 col-sm-12 m-1" style="border-radius: 20px">
                                <input required name="cv"
                                    class="form-control   @error('image') is-invalid
                                                                                    @enderror"
                                    type="file" id="cv" onchange="previewImage2()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div id="editor"></div>
                    <button type="submit" class="btn btn-primary my-2"
                        {{ !Auth()->user() ? 'disabled' : '' }}>Submit</button>
                </form>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
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

        function previewImage2() {
            const image = document.querySelector('#cv');
            const imgPreview = document.querySelector('.img-preview-cv');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        function previewImage3() {
            const image = document.querySelector('#ktp');
            const imgPreview = document.querySelector('.img-preview-ktp');

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }

        //   document.addEventListener('trix-file-accept', function(e){
        //     e.preventDefault()
        //   })
    </script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Select2 Multiple
            $('.select2-multiple').select2({
                placeholder: "Select",
                allowClear: true
            });

        });
    </script>
@endsection
