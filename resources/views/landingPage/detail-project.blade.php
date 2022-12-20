@extends('layouts.landingPage.main')
@section('content')
    @include('sweetalert::alert')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Detail Project</h1>
                        <p class="text-white">Menampilkan Detail project yang telah di buat oleh user</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section" style="background: #F8F9FA">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-2">
                    <div class="card shadow" style="border-radius: 20px;background:white">
                        <div class="card-body">

                            <h1>{{ $project->title }}</h1>

                            <p>
                                {!! $project->description !!}
                            </p>


                        </div>
                    </div>
                </div>
                <div class="col-12 mb-5">
                    <div class="card shadow" style="border-radius: 20px;background:white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="text-bold pl-5">Budget :
                                        <span class="text-muted">{{ $project->budget }}</span>
                                    </h6>
                                </div>
                                <div class="col-6">
                                    <h6 class=" pl-5">Deadline :
                                        <span class="text-muted">{{ $project->deadline }}</span>
                                    </h6>
                                </div>
                                <div class="col-6">
                                    <h6 class="text-bold pl-5">Status :
                                        <span class="text-muted">{{ $project->status }}</span>
                                    </h6>
                                </div>
                                <div class="col-6">
                                    <h6 class=" pl-5">Total Bid :
                                        <span class="text-muted">
                                            @if ($total_bid > 0)
                                                {{ $total_bid }}
                                            @else
                                                -
                                            @endif
                                        </span>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="card shadow" style="border-radius: 20px;background:white">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <h3>Project Owner</h3>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            @if ($project->user->photo)
                                                <img src="{{ asset('storage/' . $project->user->photo) }}" alt=""
                                                    width="250px" class="mg-fluid img-thumbnail rounded-circle w-100 mb-4">
                                            @elseif (!$project->user->photo && $project->user->gender == 'Laki-Laki')
                                                <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt=""
                                                    width="250px" class="mg-fluid img-thumbnail rounded-circle w-100 mb-4">
                                            @elseif (!$project->user->photo && $project->user->gender == 'Perempuan')
                                                <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt=""
                                                    width="250px" class="mg-fluid img-thumbnail rounded-circle w-100 mb-4">
                                            @else
                                                <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt=""
                                                    width="250px" class="mg-fluid img-thumbnail rounded-circle w-100 mb-4">
                                            @endif
                                        </div>
                                        <div class="col-sm-9">
                                            <h4>{{ $project->user->name }}</h4>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae
                                                voluptates. Quisquam, quae voluptates.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-5">
                                    <h3>Accepted Worker</h3>
                                    <h6>Bid masih terbuka</h6>
                                    @if (Auth::user())
                                        @if (Auth::user()->id !== $project->user_id)
                                            <button type="button"
                                                class="btn btn-primary mx-1 px-3 py-2 mb-2

                                                                    "
                                                data-toggle="modal" data-target="#staticBackdrop"
                                                {{ Auth::user()->role !== 'Worker' ? 'disabled' : '' }}
                                                @if ($checkWorker == null) disabled @endif
                                                @foreach ($bid as $item)
                                    @if ($item->user_id == Auth::user()->id)
                                    disabled
                                    @endif @endforeach>
                                                Bid
                                            </button>
                                        @endif
                                    @endif
                                    @if (Auth::user()->role == 'Worker')
                                        @if (!$checkWorker)
                                            <h6 class="text-danger">*Anda harus melengkapi data diri terlebih dahulu!</h6>
                                        @endif
                                    @endif
                                    @foreach ($bid as $item)
                                        @if ($item->user_id == Auth::user()->id)
                                            <h6 class="text-danger">*Anda sudah melakukan bid pada project ini!</h6>
                                        @endif
                                    @endforeach
                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Bid Project</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="/create-bid" method="POST">
                                                        @csrf
                                                        <div class="row">
                                                            <input type="hidden" name="project_id"
                                                                value="{{ $project->id }}">
                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label class="text-black" for="fname">Masukkan budget
                                                                        sesuai dengan yang telah ditentukan</label>
                                                                    <input type="number" class="form-control"
                                                                        id="fname" name="price" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary my-2"
                                                        {{ !Auth()->user() ? 'disabled' : '' }}>Submit</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @if (Auth::user())
                                        @if (Auth::user()->role !== 'Worker')
                                            <p class="text-danger">Tidak bisa melakukan bid, karena anda bukan worker</p>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="card shadow" style="border-radius: 20px;background:white">
                        <div class="card-body">
                            <h3>User Bids</h3>
                            <div class="container">
                                <div class="row">
                                    @forelse ($bid as $item)
                                        <div class="col-4 col-lg-1">
                                            <a href="{{ route('detailWorker', $item->user->name) }}">
                                                @if ($item->user->photo)
                                                    <img src="{{ asset('storage/' . $item->user->photo) }}"
                                                        alt="" width="250px"
                                                        class="mg-fluid img-thumbnail rounded-circle w-100 mb-4">
                                                @elseif (!$item->user->photo && $item->user->gender == 'Laki-Laki')
                                                    <img src="{{ asset('assets/img/icons/avatar/man.png') }}"
                                                        alt="" width="250px"
                                                        class="mg-fluid img-thumbnail rounded-circle w-100 mb-4">
                                                @elseif (!$item->user->photo && $item->user->gender == 'Perempuan')
                                                    <img src="{{ asset('assets/img/icons/avatar/woman.png') }}"
                                                        alt="" width="250px"
                                                        class="mg-fluid img-thumbnail rounded-circle w-100 mb-4">
                                                @else
                                                    <img src="{{ asset('assets/img/icons/avatar/user.png') }}"
                                                        alt="" width="250px"
                                                        class="mg-fluid img-thumbnail rounded-circle w-100 mb-4">
                                                @endif
                                            </a>
                                        </div>
                                    @empty
                                        <div class="col-12">
                                            <h5 class="text-center">No Bids</h5>
                                        </div>
                                    @endforelse
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
