@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Create Project</h1>
                    <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. </p>
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
        <div class="row justify-content-center p-3">
            <form class="contact-form bg-white">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="text-black" for="fname">Judul Project</label>
                            <input type="text" class="form-control" id="fname">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="text-black" for="message">Deskripsi</label>
                            <textarea name="editor1" class="form-control" id="message" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="text-black" for="fname">Budget</label>
                            <input type="number" min="0" class="form-control" id="fname">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="text-black" for="fname">Budget</label>
                            <input type="number" min="0" class="form-control" id="fname">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <small id="emailHelp" class="form-text text-danger">*Masukkan range budget dari project anda
                            (Rp.1.000.000 - Rp.2.000.000)
                        </small>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="text-black" for="email">Deadline</label>
                            <input type="date" min="{{ date('Y-m-d') }}" class="form-control" id="email"
                                aria-describedby="emailHelp">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="text-black" for="select">Select</label>

                            <select name="" id="select" class="custom-select">
                                @foreach ($categories as $item)
                                <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div id="editor"></div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor1' );
</script>
@endsection