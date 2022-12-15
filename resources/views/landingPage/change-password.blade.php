@extends('layouts.landingPage.main')
@section('content')
    @include('sweetalert::alert')

    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Ganti Password</h1>
                        <p class="text-white">Halaman untuk mengganti password </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/change-password" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-6">
                        <label class="text-black" for="oldPassword">Password Lama</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="oldPassword" name="oldPassword"
                                placeholder="Password Lama" value="">
                            <span class="input-group-text">
                                <i class="fa fa-eye-slash" id="togglePassword" style="cursor: pointer"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <label class="text-black" for="newPassword">Password Baru</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="newPassword" name="newPassword"
                                placeholder="Password Baru" value="">
                            <span class="input-group-text">
                                <i class="fa fa-eye-slash" id="togglePasswordNew" style="cursor: pointer"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <label class="text-black" for="newPasswordConfirmation">Konfirmasi Password Baru</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" id="newPasswordConfirmation"
                                name="newPasswordConfirmation" placeholder="Konfirmasi Password Baru" value="">
                            <span class="input-group-text">
                                <i class="fa fa-eye-slash" id="togglePasswordConfirm" style="cursor: pointer"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-6">
                        <button type="submit" class="btn btn-primary">Ganti Password</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@section('script')
    <script>
        const togglePassword = document.querySelector("#togglePassword");
        const oldPassword = document.querySelector("#oldPassword");

        togglePassword.addEventListener("click", function() {

            // toggle the type attribute
            const type = oldPassword.getAttribute("type") === "password" ? "text" : "password";
            oldPassword.setAttribute("type", type);
            // toggle the eye icon
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });
    </script>

    <script>
        const togglePasswordNew = document.querySelector("#togglePasswordNew");
        const newPassword = document.querySelector("#newPassword");

        togglePasswordNew.addEventListener("click", function() {

            // toggle the type attribute
            const type = newPassword.getAttribute("type") === "password" ? "text" : "password";
            newPassword.setAttribute("type", type);
            // toggle the eye icon
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });
    </script>

    <script>
        const togglePasswordConfirm = document.querySelector("#togglePasswordConfirm");
        const newPasswordConfirmation = document.querySelector("#newPasswordConfirmation");

        togglePasswordConfirm.addEventListener("click", function() {

            // toggle the type attribute
            const type = newPasswordConfirmation.getAttribute("type") === "password" ? "text" : "password";
            newPasswordConfirmation.setAttribute("type", type);
            // toggle the eye icon
            this.classList.toggle('fa-eye-slash');
            this.classList.toggle('fa-eye');
        });
    </script>
@endsection

@endsection
