@extends('layouts.landingPage.main')
@section('content')
    @include('sweetalert::alert')

    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Proyek</h1>
                        <p class="text-white">Menampilkan kumpulan Proyek yang telah dibuat oleh client.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section" style="background: #F8F9FA">
        <div class="container">
            {{-- Make search --}}
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('list-project') }}">
                        @if (request('subCategory'))
                            <input type="hidden" name="subCategory" value="{{ request('subCategory') }}">
                        @endif
                        @if (request('author'))
                            <input type="hidden" name="auhtor" value="{{ request('author') }}">
                        @endif
                        <div class="row">
                            <div class="col-lg-3 col-sm-6">
                                <label for="">Cari Kategori</label>
                                <select class="custom-select" name="filter_category" id="" onchange="submit()">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}"
                                            {{ request('filter_category') == $category->name ? 'selected' : '' }}>
                                            {{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Cari Proyek</label>
                                    <input type="text" name="search" id="search" class="form-control"
                                        placeholder="Search" onchange="submit()" value="{{ request('search') }}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="">Tenggat Waktu</label>
                                <input type="date" class="form-control" name="deadline" value="{{ request('deadline') }}"
                                    onchange="submit()">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @forelse ($projects as $item)
                    <div class="col-12 mb-4">
                        <div class="card shadow" style="border-radius: 20px;background:white">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6 col-lg-2">
                                        @if ($item->user->photo)
                                            <img src="{{ asset('storage/' . $item->user->photo) }}" alt=""
                                                width="250px" class="mg-fluid img-thumbnail rounded-circle w-100 mb-2">
                                        @elseif (!$item->user->photo && $item->user->gender == 'Laki-Laki')
                                            <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt=""
                                                width="250px" class="mg-fluid img-thumbnail rounded-circle w-100 mb-2">
                                        @elseif (!$item->user->photo && $item->user->gender == 'Perempuan')
                                            <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt=""
                                                width="250px" class="mg-fluid img-thumbnail rounded-circle w-100 mb-2">
                                        @else
                                            <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt=""
                                                width="250px" class="mg-fluid img-thumbnail rounded-circle w-100 mb-2">
                                        @endif
                                        <p class="text-center">
                                            <a
                                                href="/list-project?author={{ $item->user->name }}">{{ $item->user->name }}</a>
                                        </p>
                                    </div>
                                    <div class="col-12 col-lg-10">
                                        <h5>{{ $item->title }}</h5>
                                        <a class="text-muted"
                                            href="/list-project?subCategory={{ $item->sub_categories }}">{{ $item->sub_categories }}</a>
                                        <p>{{ $item->excerpt }}</p>
                                        <div class="card mb-3 shadow" style="border-radius: 20px">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <h6 class="text-bold pl-5">Anggaran :
                                                            <span class="text-muted">{{ $item->budget }}</span>
                                                        </h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <h6 class=" pl-5">Tenggat waktu :
                                                            <span class="text-muted">{{ $item->deadline }}</span>
                                                        </h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <h6 class="text-bold pl-5">Dibuat :
                                                            <span
                                                                class="text-muted">{{ $item->created_at->diffForHumans() }}</span>
                                                        </h6>
                                                    </div>
                                                    <div class="col-6">
                                                        <h6 class=" pl-5">Status :
                                                            <span class="text-muted">{{ $item->status }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="/detail-project/{{ $item->title }}"
                                                class="btn btn-primary mx-1 px-3 py-2">
                                                Details
                                            </a>

                                            <!-- Button trigger modal -->
                                            <!-- pop up -->

                                            {{-- @if (Auth::user())
                                    @if (Auth::user()->role == 'Worker')
                                    <!-- Button trigger modal -->

                                    <button type="button" class="btn btn-secondary mx-1 px-3 py-2" data-toggle="modal"
                                        data-target="#staticBackdrop">
                                        Bid
                                    </button>
                                    @endif
                                    @endif --}}


                                            <!-- Modal -->
                                            <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                                data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Bid Proyek
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            ...
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="button"
                                                                class="btn btn-primary">Understood</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <a href="" class="btn btn-secondary mx-1 px-3 py-2">
                                                                        Bid
                                                                    </a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <div class="row align-items-center m-3">
                            <div class="col-lg-6 mx-auto text-center">

                                <h1 class="">Tidak ada proyek.</h1>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endsection
