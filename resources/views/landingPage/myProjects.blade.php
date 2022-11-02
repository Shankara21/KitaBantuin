@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">My Projects</h1>
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
                <h3 class="my-3">My Projects</h3>
                <div class="row">
                    @forelse ($projects as $item)
                        <div class="col-lg-6 col-sm-12  mb-4">
                            <div class="card shadow" style="border-radius: 20px;background:white">
                                <div class="card-body">
                                    <h2>{{ $item -> title }}</h2>
                                    <p class="text-muted">Tanggal : {{ $item -> created_at -> format('Y-m-d') }}</p>
                                    <p class="text-muted">Deadline: {{ $item -> deadline }}</p>
                                    <p class="text-muted mb-4">Range Budget : {{ $item -> budget}}</p>
                                    <div class="d-flex justify-content-end">
                                        <a href="/details-worker/" class="btn btn-primary ">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection