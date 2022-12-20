@extends('layouts.landingPage.main')
@section('content')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Bids Saya</h1>
                        <p class="text-white">Menampilkan dari hasil yang telah di Bid oleh worker </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section">
        <div class="container">
            <div class="card my-5 shadow" style="border-radius: 20px">
                <div class="card-body">
                    <h3 class="my-3">Bids Saya</h3>
                    <div class="row">
                        @forelse ($bids as $item)
                            <div class="col-lg-6 col-sm-12  mb-4">
                                <div class="card shadow" style="border-radius: 20px;background:white">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h2>{{ $item->project->title }}</h2>
                                            @if ($item->status == 'Pending')
                                                <p class="bg-warning p-2 " style="border-radius: 30px"><i
                                                        class="fa-regular fa-clock"></i> {{ $item->status }}
                                                </p>
                                            @elseif ($item->status == 'Accepted')
                                                <p class="bg-success p-2 text-white" style="border-radius: 30px"><i
                                                        class="fa-regular fa-circle-check"></i> {{ $item->status }}
                                                </p>
                                            @else
                                                <p class="bg-danger p-2 text-white" style="border-radius: 30px"><i
                                                        class="fa-regular fa-circle-xmark"></i> {{ $item->status }}
                                                </p>
                                            @endif
                                        </div>
                                        <p class="text-muted">Pengajuan Bid : {{ $item->created_at->diffForHumans() }}
                                        </p>
                                        @if ($item->status == 'Accepted')
                                            <p class="text-muted">Diterima : {{ $item->updated_at->diffForHumans() }}
                                            </p>
                                        @endif
                                        <p class="text-muted">Harga Pengajuan : Rp. {{ number_format($item->price) }}</p>
                                        <div class="d-flex justify-content-end">
                                            <a href="/bid-details/{{ $item->id }}" class="btn btn-primary ">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-lg-12 col-sm-12  mb-4">
                                <div class="d-flex justify-content-center">
                                    <h2>Belum ada bid yang diajukan</h2>
                                </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('sweetalert::alert')
@endsection
