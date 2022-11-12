@extends('layouts.landingPage.main')
@section('css')
    <style>

        /* .input {
                            border: 0;
                            width: 1px;
                            height: 1px;
                            overflow: hidden;
                            position: absolute !important;
                            clip: rect(1px 1px 1px 1px);
                            clip: rect(1px, 1px, 1px, 1px);
                            opacity: 0;
                        }
                        .label {
                            position: relative;
                            float: left;
                            color: #C8C8C8;
                        }
                        .label:before {
                            margin: 5px;
                            content: "\f005";
                            font-family: FontAwesome;
                            display: inline-block;
                            font-size: 1.5rem;
                            color: #ccc;
                            -webkit-user-select: none;
                            -moz-user-select: none;
                            user-select: none;
                        }
                        .input:checked ~ .label:before {
                            color: #FFC107;
                        }
                        .label:hover ~ .label:before {
                            color: #ffdb70;
                        }
                        .label:hover:before {
                            color: #FFC107;
                        } */



        div.rating-select {

            width: 400px;

            display: inline-block;

        }

        .mt-200 {
            margin-top: 200px;
        }

        input.star {
            display: none;
        }



        label.star {

            float: right;

            padding: 10px;

            font-size: 36px;

            color: #4A148C;

            transition: all .2s;

        }



        input.star:checked~label.star:before {

            content: '\f005';

            color: #FD4;

            transition: all .25s;

        }


        input.star-5:checked~label.star:before {

            color: #FE7;

            text-shadow: 0 0 20px #952;

        }



        input.star-1:checked~label.star:before {
            color: #F62;
        }



        label.star:hover {
            transform: rotate(-15deg) scale(1.3);
        }



        label.star:before {

            content: '\f006';

            font-family: FontAwesome;

        }
    </style>
@endsection
@section('content')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Profile Worker</h1>
                        <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and
                            Consonantia, there live the blind texts. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="card shadow" style="border-radius: 20px">
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
                                <img src="{{ asset('storage/' . $user->photo) }}" alt="" width="250px"
                                    class="rounded-circle img-thumbnail mb-3">
                            @elseif (!$user->photo && $user->gender == 'Laki-Laki')
                                <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt="" width="250px"
                                    class="rounded-circle img-thumbnail mb-3">
                            @elseif (!$user->photo && $user->gender == 'Perempuan')
                                <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt="" width="250px"
                                    class="rounded-circle img-thumbnail mb-3">
                            @else
                                <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt="" width="250px"
                                    class="rounded-circle img-thumbnail mb-3">
                            @endif
                            <h4 id="username">{{ $user->username }}</h4>
                            <form method="POST" enctype="multipart/form-data" action="/profile-worker/{{ $user->id }}">
                                @method('PUT')
                                @csrf
                                <div class="mb-3 text-start d-none" id="update">
                                    <label for="formFile" class="form-label">Update Foto</label>
                                    <input class="form-control" value="{{ $user->photo }}" type="file" id="formFile"
                                        name="photo">
                                    <input type="hidden" name="oldPhoto" value="{{ $user->photo }}">
                                </div>
                        </div>
                        <div class="col-lg-9 col-sm-12">
                            <div class="bio">
                                <div class="row p-5">
                                    <div class="col-lg-6 col-sm-12  mb-3">
                                        <div class="card" style="border: none">
                                            <label for="">Nama</label>
                                            <h4>{{ $user->name }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12  mb-3">
                                        <div class="card" style="border: none">
                                            <label for="">Phone</label>
                                            <h4>{{ $user->phone }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12  mb-3">
                                        <div class="card" style="border: none">
                                            <label for="">Jenis Kelamin</label>
                                            <h4>{{ $user->gender }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12  mb-3">
                                        <div class="card" style="border: none">
                                            <label for="">Alamat</label>
                                            <h4>{{ $user->address }}</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12  mb-3">
                                        <div class="card" style="border: none">
                                            <label for="">Alamat Email</label>
                                            <h4>{{ $user->email }}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form d-none">

                                <div class="row">
                                    <div class="col-lg-6 col-sm-12  mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Nama</label>
                                        <input type="text" class="form-control" value="{{ $user->name }}"
                                            id="exampleInputEmail1" name="name">
                                    </div>
                                    <div class="col-lg-6 col-sm-12  mb-3">
                                        <label for="exampleInputEmail1" class="form-label">No HP</label>
                                        <input type="text" class="form-control" value="{{ $user->phone }}"
                                            id="exampleInputEmail1" name="phone">
                                    </div>
                                    <div class="col-lg-6 col-sm-12  mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                        <select class="custom-select" name="gender">
                                            <option value="Laki-Laki"
                                                {{ $user->gander == 'Laki-Laki' ? 'selected' : '' }}>
                                                Laki-Laki</option>
                                            <option value="Perempuan"
                                                {{ $user->gander == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-sm-12  mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" value="{{ $user->address }}"
                                            id="exampleInputEmail1" name="address">
                                    </div>
                                    <div class="col-lg-6 col-sm-12  mb-5">
                                        <label for="exampleInputEmail1" class="form-label">Email</label>
                                        <input type="email" class="form-control" value="{{ $user->email }}"
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
            <div class="card my-5 shadow" style="border-radius: 20px">
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
                        <li class="nav-item">
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                                aria-controls="review" aria-selected="false">Tambah Rating</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="view-tab" data-toggle="tab" href="#view" role="tab"
                                aria-controls="view" aria-selected="false">Show Rating</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="d-flex justify-content-end m-2">
                                <a href="/create-portofolio" class="btn btn-primary">Upload portofoliomu</a>
                            </div>
                            <div class="row">
                                @forelse ($portofolios as $item)
                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                        <div class="card shadow" style="border-radius: 20px;background:white">
                                            <div class="card-body">
                                                <h2>{{ $item->title }}</h2>
                                                <div class="mb-4">
                                                    @if ($item->image)
                                                        <img src="{{ asset('storage/' . $item->image) }}" height="196px"
                                                            width="100%" style="border-radius: 25px">
                                                    @else
                                                        <img src="{{ asset('/landingPage/images/' . $item->title . '.png') }}"
                                                            height="196px" width="100%" style="border-radius: 25px">
                                                    @endif
                                                </div>
                                                <p class="text-muted">
                                                    <a href="{{ $item->link }}" target="_blank"
                                                        class="text-decoration-underline">{{ $item->link }}</a>
                                                </p>
                                                <div class="d-flex justify-content-end">
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="card shadow" style="border-radius: 20px;background:white">
                                            <div class="card-body">
                                                <h2>Belum ada portofolio</h2>
                                            </div>
                                        </div>
                                @endforelse

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!-- Button trigger modal -->
                        <div class="d-flex justify-content-end m-2">
                            @if (!$details->cv)
                                <button type="button" class="btn btn-primary p-2" data-toggle="modal"
                                    data-target="#staticBackdrop">
                                    Upload CV
                                </button>
                            @endif
                            <a href="/edit-skill/{{ $details->id }}/edit" class="btn btn-primary p-2">Update Skill</a>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Upload CV anda</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        ...
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Understood</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                Skill
                                <ul>
                                    @foreach ($skill as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach

                                </ul>

                            </div>
                            <div class="col-6">
                                <h1>CV</h1>
                                @if ($details->cv)
                                    <img src="{{ asset('storage/' . $details->cv) }}" width="400"
                                        style="border-radius: 25px">
                                @else
                                    <img src="{{ asset('/landingPage/images/cv.jpg') }}" width="400"
                                        style="border-radius: 25px">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    </div>

                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        <h1>Rating</h1>
                        <br>
                        <form action="/rating" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="rating-select" id="rating-select">

                                <input type="radio" id="rate-5" value="5" name="crating"
                                    class="star star-5" /><label for="rate-5" class="star star-5"></label>
                                <input type="radio" id="rate-4" value="4" name="crating"
                                    class="star star-4" /><label for="rate-4" class="star star-4"></label>
                                <input type="radio" id="rate-3" value="3" name="crating"
                                    class="star star-3" /><label for="rate-3" class="star star-3"></label>
                                <input type="radio" id="rate-2" value="2" name="crating"
                                    class="star star-2" /><label for="rate-2" class="star star-2"></label>
                                <input type="radio" id="rate-1" value="1" name="crating"
                                    class="star star-1" /><label for="rate-1" class="star star-1"></label>
                            </div>
                            <br>
                            <br>
                            <input type="text" class="form-control rating" id="rating" name="rating" />
                            <br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="view" role="tabpanel" aria-labelledby="view-tab">
                        <h1>Rating</h1>
                        <br>
                        @foreach (range(1,5) as $i)
                            @if ($details->rating > 0)
                                <i class="fa fa-star" style="color: #ffd700"></i>
                            @else
                                <i class="fa fa-star-o" style="color: #e6e6fa"></i>
                            @endif
                            <?php $details->rating--; ?>
                        @endforeach
                    </div>
                </div>
                {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
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

                    </div>
                    <div class="tab-pane fade mt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                    </div>
                    <div class="tab-pane fade mt-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    </div>
    @include('sweetalert::alert')
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
    <script>
        $('#rating-select input').change(function() {
            var rating = $('#rating-select input:checked').map(function() {
                return this.value;
            }).get();
            $('#rating').val((rating.length > 0 ? rating : ""));
        });
    </script>


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
