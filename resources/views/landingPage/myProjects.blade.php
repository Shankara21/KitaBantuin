@extends('layouts.landingPage.main')
@section('content')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Proyek Saya</h1>
                        <p class="text-white">Menampilkan status proyek yang sudah kita buat</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section">
        <div class="container">
            <div class="card my-5 shadow" style="border-radius: 20px">
                <div class="card-body">
                    <h3>Proyek Saya</h3>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">Buka</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile" aria-selected="false">Sedang dalam proses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                aria-controls="contact" aria-selected="false">Selesai</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade mt-3 show active" id="home" role="tabpanel"
                            aria-labelledby="home-tab">
                            <div class="row">
                                @forelse ($projectsOpen as $item)
                                    <div class="col-lg-6 col-sm-12  mb-4">
                                        <div class="card shadow" style="border-radius: 20px;background:white">
                                            <div class="card-body">
                                                <h2>{{ $item->title }}</h2>
                                                <p class="text-muted">Tanggal : {{ $item->created_at->format('Y-m-d') }}
                                                </p>
                                                <p class="text-muted">Tenggat Waktu: {{ $item->deadline }}</p>
                                                <p class="text-muted mb-4">Kisaran Anggaran : {{ $item->budget }}</p>
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{ route('detail-myProject', $item->title) }}"
                                                        class="btn btn-primary ">Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <h1 class="text-center">Tidak ada data</h1>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                @forelse ($projectsOnProcess as $item)
                                    <div class="col-lg-6 col-sm-12  mb-4">
                                        <div class="card shadow" style="border-radius: 20px;background:white">
                                            <div class="card-body">
                                                <h2>{{ $item->title }}</h2>
                                                <p class="text-muted">Tanggal : {{ $item->created_at->format('Y-m-d') }}
                                                </p>
                                                <p class="text-muted">Tenggat Waktu: {{ $item->deadline }}</p>
                                                <p class="text-muted mb-4">Kisaran Anggaran: {{ $item->budget }}</p>
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{ route('detail-myProject', $item->title) }}"
                                                        class="btn btn-primary ">Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <h1 class="text-center">Tidak ada data</h1>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                        <div class="tab-pane fade mt-3" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                @forelse ($projectsDone as $item)
                                    <div class="col-lg-6 col-sm-12  mb-4">
                                        <div class="card shadow" style="border-radius: 20px;background:white">
                                            <div class="card-body">
                                                <h2>{{ $item->title }}</h2>
                                                <p class="text-muted">Tanggal :
                                                    {{ $item->created_at->format('Y-m-d') }}</p>
                                                <p class="text-muted">Tenggat Waktu: {{ $item->deadline }}</p>
                                                <p class="text-muted mb-4">Kisaran Anggaran : {{ $item->budget }}</p>
                                                <div class="d-flex justify-content-end">
                                                    <a href="{{ route('detail-myProject', $item->title) }}"
                                                        class="btn btn-primary ">Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <div class="col-12">
                                        <h1 class="text-center">Tidak ada data</h1>
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
