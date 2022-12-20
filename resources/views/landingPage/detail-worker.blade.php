@extends('layouts.landingPage.main')
@section('content')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Detail Worker</h1>
                        <p class="text-white">Pada halaman ini menampilkan detail worker seperti data diri worker, portofolio
                            dan hasil project yang telah di selesaikan</p>
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
                                    @if ($worker->photo)
                                        <img src="{{ asset('storage/' . $worker->photo) }}" alt="" width="250px"
                                            class="img-fluid img-thumbnail rounded-circle w-100 mb-4">
                                    @elseif (!$worker->photo && $worker->gender == 'Laki-Laki')
                                        <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt=""
                                            width="250px" class="img-fluid img-thumbnail rounded-circle w-100 mb-4">
                                    @elseif (!$worker->photo && $worker->gender == 'Perempuan')
                                        <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt=""
                                            width="250px" class="img-fluid img-thumbnail rounded-circle w-100 mb-4">
                                    @else
                                        <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt=""
                                            width="250px" class="img-fluid img-thumbnail rounded-circle w-100 mb-4">
                                    @endif
                                </div>
                                <div class="col-12 col-lg-9">
                                    <div class="card shadow " style="border-radius: 20px">
                                        <div class="card-body">
                                            <h3>About Me</h3>
                                            {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
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
                                                            <td>
                                                                <h4>:</h4>
                                                            </td>
                                                            <td>
                                                                <h4>{{ $details -> user -> name }}</h4>
                                        </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>email</h4>
                                            </td>
                                            <td>
                                                <h4>:</h4>
                                            </td>
                                            <td>
                                                <h4>{{ $details -> user -> email }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>gender</h4>
                                            </td>
                                            <td>
                                                <h4>:</h4>
                                            </td>
                                            <td>
                                                <h4>{{ $details -> user -> gender }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>address</h4>
                                            </td>
                                            <td>
                                                <h4>:</h4>
                                            </td>
                                            <td>
                                                <h4>{{ $details -> user -> address }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>phone</h4>
                                            </td>
                                            <td>
                                                <h4>:</h4>
                                            </td>
                                            <td>
                                                <h4>{{ $details -> user -> phone }}</h4>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h4>skill</h4>
                                            </td>
                                            <td>
                                                <h4>:</h4>
                                            </td>
                                            <td>
                                                <h4>{{ $details -> skill }}</h4>
                                            </td>
                                        </tr>
                                        </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade mt-3 show active" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div class="row">
                                            @forelse ($portofolio as $item)
                                            <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                                <div class="card shadow" style="border-radius: 20px;background:white">
                                                    <div class="card-body">
                                                        <h2>{{ $item -> title }}</h2>
                                                        <div class="mb-4">
                                                            @if ($item->image)
                                                            <img src="{{ asset('storage/'.$item -> image) }}"
                                                                height="196px" width="100%" style="border-radius: 25px">
                                                            @else
                                                            <img src="{{ asset('/landingPage/images/'.$item -> title.'.png') }}"
                                                                height="196px" width="100%" class="img-fluid"
                                                                style="border-radius: 25px">
                                                            @endif

                                                        </div>
                                                        <p class="text-muted">
                                                            <a href="{{ $item -> link }}" target="_blank"
                                                                class="text-decoration-underline">{{ $item -> link }}</a>
                                                        </p>
                                                        <div class="d-flex justify-content-end">
                                                        </div>
                                                    </div>
                                                </div>

                                                @empty

                                                @endforelse

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade mt-3" id="contact" role="tabpanel"
                                        aria-labelledby="contact-tab">Project
                                    </div>
                                </div> --}}
                                            <div class="custom-accordion overflow-auto" id="accordion_1">
                                                <div class="accordion-item">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link" type="button" data-toggle="collapse"
                                                            data-target="#collapseOne" aria-expanded="true"
                                                            aria-controls="collapseOne">Details</button>
                                                    </h2>

                                                    <div id="collapseOne" class="collapse show overflow-auto"
                                                        aria-labelledby="headingOne" data-parent="#accordion_1">
                                                        <div class="accordion-body">
                                                            <table class="table table-borderless overflow-auto">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>
                                                                            <h4>Name</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>:</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>{{ $details->user->name }}</h4>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h4>email</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>:</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>{{ $details->user->email }}</h4>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h4>gender</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>:</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>{{ $details->user->gender }}</h4>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h4>address</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>:</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>{{ $details->user->address }}</h4>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h4>phone</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>:</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>{{ $details->user->phone }}</h4>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>
                                                                            <h4>skill</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>:</h4>
                                                                        </td>
                                                                        <td>
                                                                            <h4>{{ $details->skill }}</h4>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div> <!-- .accordion-item -->

                                                <div class="accordion-item">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button"
                                                            data-toggle="collapse" data-target="#collapseTwo"
                                                            aria-expanded="false"
                                                            aria-controls="collapseTwo">Portofolio</button>
                                                    </h2>
                                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                                        data-parent="#accordion_1">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                @forelse ($portofolio as $item)
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                                                        <div class="card shadow"
                                                                            style="border-radius: 20px;background:white">
                                                                            <div class="card-body">
                                                                                <h2>{{ $item->title }}</h2>
                                                                                <div class="mb-4">
                                                                                    @if ($item->image)
                                                                                        <img src="{{ asset('storage/' . $item->image) }}"
                                                                                            height="196px" width="100%"
                                                                                            style="border-radius: 25px">
                                                                                    @else
                                                                                        <img src="{{ asset('/landingPage/images/' . $item->title . '.png') }}"
                                                                                            height="196px" width="100%"
                                                                                            class="img-fluid"
                                                                                            style="border-radius: 25px">
                                                                                    @endif

                                                                                </div>
                                                                                <p class="text-muted">
                                                                                    <a href="{{ $item->link }}"
                                                                                        target="_blank"
                                                                                        class="text-decoration-underline">{{ $item->link }}</a>
                                                                                </p>
                                                                                <div class="d-flex justify-content-end">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                @empty
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <!-- .accordion-item -->
                                                <div class="accordion-item">
                                                    <h2 class="mb-0">
                                                        <button class="btn btn-link collapsed" type="button"
                                                            data-toggle="collapse" data-target="#collapseThree"
                                                            aria-expanded="false" aria-controls="collapseThree">Project
                                                            Result</button>
                                                    </h2>

                                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                                        data-parent="#accordion_1">
                                                        <div class="accordion-body">
                                                            <div class="row">
                                                                @forelse ($projectResult as $item)
                                                                    <div class="col-lg-4 col-md-6 col-sm-12 mb-3">
                                                                        <div class="card shadow"
                                                                            style="border-radius: 20px;background:white">
                                                                            <div class="card-body">
                                                                                <div
                                                                                    class="d-flex justify-content-between">
                                                                                    <h2>{{ $item->project->title }}
                                                                                    </h2>
                                                                                    <span class="">
                                                                                        <i
                                                                                            class="fa-solid fa-star text-warning"></i>
                                                                                        {{ $item->project->rating }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="mb-4">
                                                                                    <p class="text-muted">Category :
                                                                                        {{ $item->project->sub_categories }}
                                                                                    </p>
                                                                                    <p class="text-muted">
                                                                                        Deadline :
                                                                                        {{ $item->project->deadline }}
                                                                                    </p>
                                                                                    <p class="text-muted">
                                                                                        Finished :
                                                                                        {{ $item->created_at->format('Y-m-d') }}
                                                                                    </p>
                                                                                    <p class="text-muted"></p>
                                                                                </div>
                                                                                <div class="d-flex justify-content-end">
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                @empty
                                                                @endforelse
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div> <!-- .accordion-item -->
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
    @include('sweetalert::alert')
@endsection
