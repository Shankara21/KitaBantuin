@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Profile</h1>
                    <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-warning align-self-end my-3" id="edit" onclick="edit()">Edit profile <i
                            class="fas fa-edit"></i></button>
                    <button class="btn btn-danger align-self-end d-none my-3" id="back" onclick="back()">Batal <i
                            class="fas fa-times"></i></button>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12 text-center pt-3">
                        @if ($user->photo)
                        <img src="{{ asset('storage/'. $user -> photo) }}" alt="" width="250px"
                            class="rounded-circle img-thumbnail mb-3">
                        @elseif (!$user -> photo && $user -> gender == 'Laki-laki')
                        <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt="" width="250px"
                            class="rounded-circle img-thumbnail mb-3">
                        @elseif (!$user -> photo && $user -> gender == 'Perempuan')
                        <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt="" width="250px"
                            class="rounded-circle img-thumbnail mb-3">
                        @else
                        <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt="" width="250px"
                            class="rounded-circle img-thumbnail mb-3">
                        @endif
                        <h4 id="username">{{ $user -> username }}</h4>
                        <form method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3 text-start d-none" id="update">
                                <label for="formFile" class="form-label">Update Foto</label>
                                <input class="form-control" value="{{ $user -> image }}" type="file" id="formFile"
                                    name="image">
                                <input type="hidden" name="oldImage" value="{{ $user -> image }}">
                            </div>
                    </div>
                    <div class="col-lg-9 col-sm-12">

                        <div class="bio">
                            <div class="row p-5">
                                <div class="col-lg-6 col-sm-12  mb-3">
                                    <div class="card" style="border: none">
                                        <label for="">Nama</label>
                                        <h4>{{ $user -> name }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12  mb-3">
                                    <div class="card" style="border: none">
                                        <label for="">Username</label>
                                        <h4>{{ $user -> username }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12  mb-3">
                                    <div class="card" style="border: none">
                                        <label for="">Phone</label>
                                        <h4>{{ $user -> phone }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12  mb-3">
                                    <div class="card" style="border: none">
                                        <label for="">Jenis Kelamin</label>
                                        <h4>{{ $user -> gender }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12  mb-3">
                                    <div class="card" style="border: none">
                                        <label for="">Alamat</label>
                                        <h4>{{ $user -> address }}</h4>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-12  mb-3">
                                    <div class="card" style="border: none">
                                        <label for="">Alamat Email</label>
                                        <h4>{{ $user -> email }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form d-none">

                            <div class="row">
                                <div class="col-lg-6 col-sm-12  mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="{{ $user -> name }}"
                                        id="exampleInputEmail1" name="name">
                                </div>
                                <div class="col-lg-6 col-sm-12  mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Username</label>
                                    <input type="text" class="form-control" value="{{ $user -> username }}"
                                        id="exampleInputEmail1" name="username">
                                </div>
                                <div class="col-lg-6 col-sm-12  mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No HP</label>
                                    <input type="text" class="form-control" value="{{ $user -> phone }}"
                                        id="exampleInputEmail1" name="phone">
                                </div>
                                <div class="col-lg-6 col-sm-12  mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                    <select class="custom-select" name="gender">
                                        <option selected>Open this select menu</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 col-sm-12  mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" value="{{ $user -> address }}"
                                        id="exampleInputEmail1" name="address">
                                </div>
                                <div class="col-lg-6 col-sm-12  mb-5">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{ $user -> email }}"
                                        id="exampleInputEmail1" name="email">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary">Submit <i
                                            class="fas fa-check-circle"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card my-5">
            <div class="card-body">
                <h3>About Me</h3>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Expertise</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                            aria-controls="contact" aria-selected="false">Project</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade mt-3 show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        Portofolio
                    </div>
                    <div class="tab-pane fade mt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-6">Skill</div>
                            <div class="col-6">CV</div>
                        </div>
                    </div>
                    <div class="tab-pane fade mt-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">Project
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong2">
                    Launch demo modal
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Modal 1</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Show a second modal and hide this one with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second
                    modal</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Hide this modal and show the first with the button below.
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to
                    first</button>
            </div>
        </div>
    </div>
</div>
<a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">Open first modal</a>
@endsection

@section('script')
<script>
    const edit = () => {
            document.querySelector('.bio').classList.add('d-none');
            document.querySelector('.form').classList.remove('d-none');
            document.querySelector('#edit').classList.add('d-none');
            document.querySelector('#back').classList.remove('d-none');
            document.querySelector('#update').classList.remove('d-none');
            document.querySelector('#username').classList.add('d-none');
        }
        const back = () => {
            document.querySelector('.bio').classList.remove('d-none');
            document.querySelector('.form').classList.add('d-none');
            document.querySelector('#edit').classList.remove('d-none');
            document.querySelector('#back').classList.add('d-none');
            document.querySelector('#update').classList.add('d-none');
            document.querySelector('#username').classList.remove('d-none');
        }
</script>
@endsection