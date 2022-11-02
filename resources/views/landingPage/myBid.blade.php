@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">My Bids</h1>
                    <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="untree_co-section">
    <div class="container">
        <div class="card my-5 shadow" style="border-radius: 20px">
            <div class="card-body">
                <h3 class="my-3">My Bids</h3>
                <div class="row">
                    <div class="col-lg-6 col-sm-12  mb-4">
                        <div class="card shadow" style="border-radius: 20px;background:white">
                            <div class="card-body">
                                <h2>Membuat template bootstrap 5</h2>
                                <p class="text-muted">Tanggal : 2022-12-21</p>
                                <p class="text-muted">Total bid : 12</p>
                                {{-- <p class="text-muted mb-4">{{ $item}}</p> --}}
                                <div class="d-flex justify-content-end">
                                    <a href="/details-worker/" class="btn btn-primary ">Details</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12  mb-4">
                        <div class="card shadow" style="border-radius: 20px;background:white">
                            <div class="card-body">
                                <h2>Membuat template bootstrap 5</h2>
                                <p class="text-muted">Tanggal : 2022-12-21</p>
                                <p class="text-muted">Total bid : 12</p>
                                {{-- <p class="text-muted mb-4">{{ $item}}</p> --}}
                                <div class="d-flex justify-content-end">
                                    <a href="/details-worker/" class="btn btn-primary ">Details</a>
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