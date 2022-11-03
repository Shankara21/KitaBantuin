@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Detail Worker</h1>
                    <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="untree_co-section" style="background: #F8F9FA">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card shadow" style="border-radius: 20px;background:white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 col-lg-3">
                                @if ($worker-> photo)
                                <img src="{{ asset('storage/'. $worker-> photo) }}" alt="" width="250px"
                                    class="img-fluid img-thumbnail rounded-circle w-100 mb-4">
                                @elseif (!$worker-> photo && $worker-> gender == 'Laki-laki')
                                <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt="" width="250px"
                                    class="img-fluid img-thumbnail rounded-circle w-100 mb-4">
                                @elseif (!$worker-> photo && $worker-> gender == 'Perempuan')
                                <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt="" width="250px"
                                    class="img-fluid img-thumbnail rounded-circle w-100 mb-4">
                                @else
                                <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt="" width="250px"
                                    class="img-fluid img-thumbnail rounded-circle w-100 mb-4">
                                @endif
                            </div>
                            <div class="col-12 col-lg-9">
                                <div class="card shadow" style="border-radius: 20px">
                                    <div class="card-body">
                                        <h3>About Me</h3>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                                    role="tab" aria-controls="home" aria-selected="true">Details</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                                    role="tab" aria-controls="profile"
                                                    aria-selected="false">Portofolio</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                                    role="tab" aria-controls="contact" aria-selected="false">Project
                                                    Result</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade mt-3 show active" id="home" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4>Name</h4>
                                                            </td>
                                                            <td><h4>:</h4></td>
                                                            <td>
                                                                <h4>{{ $details -> user -> name }}</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h4>email</h4>
                                                            </td>
                                                            <td><h4>:</h4></td>
                                                            <td>
                                                                <h4>{{ $details -> user -> email }}</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h4>gender</h4>
                                                            </td>
                                                            <td><h4>:</h4></td>
                                                            <td>
                                                                <h4>{{ $details -> user -> gender }}</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h4>address</h4>
                                                            </td>
                                                            <td><h4>:</h4></td>
                                                            <td>
                                                                <h4>{{ $details -> user -> address }}</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h4>phone</h4>
                                                            </td>
                                                            <td><h4>:</h4></td>
                                                            <td>
                                                                <h4>{{ $details -> user -> phone }}</h4>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <h4>skill</h4>
                                                            </td>
                                                            <td><h4>:</h4></td>
                                                            <td>
                                                                <h4>{{ $details -> skill -> name }}</h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade mt-3" id="profile" role="tabpanel"
                                                aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-6">Skill</div>
                                                    <div class="col-6">CV</div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade mt-3" id="contact" role="tabpanel"
                                                aria-labelledby="contact-tab">Project
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection