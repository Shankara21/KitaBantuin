@extends('layouts.landingPage.main')
@section('content')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Profil</h1>
                        <p class="text-white">Isi Profile sesuai dengan identitas anda agar dapat menghubungi anda</p>
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
                        <button class="btn btn-warning align-self-end my-3" id="edit" onclick="edit()">Edit profil <i
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
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" enctype="multipart/form-data" action="/profile/{{ $user->id }}">
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
                                            <label for="">Nomor Telepon</label>
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
                                    <div class="col-lg-6 col-sm-12  mb-3">
                                        <div class="card" style="border: none">
                                            <label for="">Bank</label>
                                            @if ($user->bankuser_id == null)
                                                <h4></h4>
                                                @else
                                                <h4>{{ $user->bankUser->name }}</h4>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-12  mb-3">
                                        <div class="card" style="border: none">
                                            <label for="">Nomor Rekening</label>
                                            <h4>{{ $user->bank_account }}</h4>
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
                                        <label for="exampleInputEmail1" class="form-label">Nomor Telepon</label>
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
                                    <div class="col-lg-6 col-sm-12  mb-5">
                                        <label for="" class="form-label">Bank</label>
                                        <select class="form-control" name="bankuser_id">
                                            @foreach ($bank as $item)
                                                <option value="{{ $item->id }}" {{ $user->bankuser_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-sm-12  mb-5">
                                        <label for="" class="form-label">No Rekening</label>
                                        <input type="number" class="form-control" value="{{ $user->bank_account }}"
                                            id="" name="bank_account">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Kirim <i
                                                class="fas fa-check-circle"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection

@section('script')
    <script>
        const edit = () => {
            document.querySelector('.bio').classList.add('d-none');
            document.querySelector('.form').classList.remove('d-none');
            document.querySelector('#edit').classList.add('d-none');
            document.querySelector('#back').classList.remove('d-none');
            document.querySelector('#update').classList.remove('d-none');
        }
        const back = () => {
            document.querySelector('.bio').classList.remove('d-none');
            document.querySelector('.form').classList.add('d-none');
            document.querySelector('#edit').classList.remove('d-none');
            document.querySelector('#back').classList.add('d-none');
            document.querySelector('#update').classList.add('d-none');
        }
    </script>
@endsection
