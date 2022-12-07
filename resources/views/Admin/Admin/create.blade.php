@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="m-3">
                <a href="{{ route('admin.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Create new Admin</strong></h5>
                <small class="text-muted float-end">user Table</small>
            </div>
            @if (count($errors) > 0)
            <div class="mx-3 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name"
                                placeholder=" Insert your Name" name="name" required />
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="basic-default-name"
                                placeholder="Insert your Email" name="email" required />
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="basic-default-name"
                                placeholder=" Insert your Email" name="password" required />
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Role</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example" name="role">
                                <option value="Admin">Admin</option>
                                <option value="User">User</option>
                                <option value="Worker">Worker</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Gender</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example" name="gender">
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Phone Number</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name"
                                placeholder=" Insert your phone" name="phone" required />
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Bank Account</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id="basic-default-name"
                                placeholder="e.g 12612837120948187" name="bank_account" required />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <img class="img-preview img-fluid col-sm-5 mb-3">
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-2 col-form-label" for="photo">Photo</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="photo" placeholder="Photo" name="photo" required
                                onchange="previewImage()" />
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <label class="col-sm-2 form-label" for="basic-icon-default-message">Address</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea id="basic-icon-default-message" class="form-control"
                                    placeholder="Insert your Address" aria-describedby="basic-icon-default-message2"
                                    name="address"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function previewImage(){
          const image = document.querySelector('#photo');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.width = '150px';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
          }
        }

        document.addEventListener('trix-file-accept', function(e){
          e.preventDefault()
        })
</script>
@endsection