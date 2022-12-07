@extends('layouts.landingPage.main')
@section('content')
    @include('sweetalert::alert')

    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Pekerja Kami</h1>
                        <p class="text-white">ICT Worker atau professional IT adalah mereka yang memiliki keahlian khusus
                            dan
                            kompetensi khusus untuk melahirkan karya cipta atau inovasi dibidang informatika, seperti:
                            program, algoritma, aplikasi, perangkat keras, metodologi, pendekatan implementasi,dan lain
                            sebagainya. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="untree_co-section" style="background: #F8F9FA">
        <div class="container">
            <!-- Button trigger modal -->

            <div class="d-flex justify-content-end">
                @if (Auth::user())
                    @if (!$check && Auth::user()->role == 'User')
                        <button type="button" class="btn btn-primary p-2 my-4 " data-toggle="modal"
                            data-target="#staticBackdrop">
                            Ingin jadi pekerja kami?
                        </button>
                    @endif
                @endif
            </div>
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li>
                                    <p>SYARAT & KETENTUAN</p>
                                    <ol>
                                        <li>
                                            <p>Isi nama lengkap</p>
                                        </li>
                                        <li>
                                            <p>Isi nomor telepon</p>
                                        </li>
                                        <li>
                                            <p>Isi alamat</p>
                                        </li>
                                        <li>
                                            <p>Isi email</p>
                                        </li>
                                    </ol>
                                </li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <a href="{{ route('submitWorker') }}" class="btn btn-primary">Kirim</a>
                        </div>
                    </div>
                </div>
            </div>
            <h3>Top Worker</h3>
            <div class="row">
                @forelse ($topWorkers as $item)
                    @php
                        $porto = $portofolios->where('worker_details_id', $item->id)->first();
                    @endphp
                    <div class="col-lg-4 col-sm-12  mb-4">
                        <div class="card shadow" style="border-radius: 20px;background:white">
                            <div class="d-flex justify-content-between">
                                <div class="p-2 d-flex justify-content-center">
                                    @if ($item->user->photo)
                                        <img src="{{ asset('storage/' . $item->user->photo) }}" alt=""
                                            width="250px" class="img-fluid img-thumbnail rounded-circle w-50 ">
                                    @elseif (!$item->user->photo && $item->user->gender == 'Laki-Laki')
                                        <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt=""
                                            width="250px" class="img-fluid img-thumbnail rounded-circle w-50 ">
                                    @elseif (!$item->user->photo && $item->user->gender == 'Perempuan')
                                        <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt=""
                                            width="250px" class="img-fluid img-thumbnail rounded-circle w-50 ">
                                    @else
                                        <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt=""
                                            width="250px" class="img-fluid img-thumbnail rounded-circle w-50 ">
                                    @endif
                                </div>
                                <div class="" style="transform: translateX(-20px);">
                                    <div class="pt-3 d-flex">
                                        <span><i class="fa-solid fa-star text-warning m-1"></i> </span>
                                        <p class="">{{ $item->rating }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5> Nama : {{ $item->user->name }}</h5>
                                <h6>Skill : {{ $item->skill }}</h6>

                                {{-- <p class="text-muted mb-4">{{ $item}}</p> --}}
                                <div class="mb-4">
                                    {{-- <div class="owl-single dots-absolute owl-carousel">
                                    <img src="/landingPage/images/slider-1.jpg" alt="Free HTML Template by Untree.co" class="img-fluid"
                                        style="border-radius: 25px">
                                    <img src="/landingPage/images/slider-2.jpg" alt="Free HTML Template by Untree.co" class="img-fluid"
                                        style="border-radius: 25px">
                                    </div> --}}
                                    @if ($porto->image)
                                        <img src="{{ asset('storage/' . $porto->image) }}" alt="p" class="img-fluid"
                                            style="border-radius: 25px">
                                    @else
                                        <img src="{{ asset('/landingPage/images/' . $porto->title . '.png') }}"
                                            alt="{{ '/landingPage/images/' . $porto->title . '.png' }}" class="img-fluid"
                                            style="border-radius: 25px">
                                    @endif
                                </div>
                                <a href="/details-worker/{{ $item->user->name }}" class="btn btn-info d-block">Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <div class="row align-items-center m-3">
                            <div class="col-lg-6 mx-auto text-center">

                                <h1 class="">Belum ada pekerja terbaik.</h1>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
            <h3>List Worker</h3>
            <div class="row">
                @forelse ($workers as $item)
                    @php
                        $porto = $portofolios->where('worker_details_id', $item->id)->first();
                    @endphp
                    <div class="col-lg-4 col-sm-12  mb-4">
                        <div class="card shadow" style="border-radius: 20px;background:white">
                            <div class="d-flex justify-content-between">
                                <div class="p-2 d-flex justify-content-center">
                                    @if ($item->user->photo)
                                        <img src="{{ asset('storage/' . $item->user->photo) }}" alt=""
                                            width="250px" class="img-fluid img-thumbnail rounded-circle w-50 ">
                                    @elseif (!$item->user->photo && $item->user->gender == 'Laki-Laki')
                                        <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt=""
                                            width="250px" class="img-fluid img-thumbnail rounded-circle w-50 ">
                                    @elseif (!$item->user->photo && $item->user->gender == 'Perempuan')
                                        <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt=""
                                            width="250px" class="img-fluid img-thumbnail rounded-circle w-50 ">
                                    @else
                                        <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt=""
                                            width="250px" class="img-fluid img-thumbnail rounded-circle w-50 ">
                                    @endif
                                </div>
                                <div class="" style="transform: translateX(-20px);">
                                    <div class="pt-3 d-flex">
                                        <span><i class="fa-solid fa-star text-warning m-1"></i> </span>
                                        <p class="">{{ number_format($item->rating, 2) }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h5> Nama : {{ $item->user->name }}</h5>
                                <h6>Skill : {{ $item->skill }}</h6>

                                {{-- <p class="text-muted mb-4">{{ $item}}</p> --}}
                                <div class="mb-4">
                                    {{-- <div class="owl-single dots-absolute owl-carousel">
                                    <img src="/landingPage/images/slider-1.jpg" alt="Free HTML Template by Untree.co" class="img-fluid"
                                        style="border-radius: 25px">
                                    <img src="/landingPage/images/slider-2.jpg" alt="Free HTML Template by Untree.co" class="img-fluid"
                                        style="border-radius: 25px">
                                    </div> --}}
                                    @if ($porto->image)
                                        <img src="{{ asset('storage/' . $porto->image) }}" alt="p" class="img-fluid"
                                            style="border-radius: 25px">
                                    @else
                                        <img src="{{ asset('/landingPage/images/' . $porto->title . '.png') }}"
                                            alt="{{ '/landingPage/images/' . $porto->title . '.png' }}" class="img-fluid"
                                            style="border-radius: 25px">
                                    @endif
                                </div>
                                <a href="/details-worker/{{ $item->user->name }}" class="btn btn-info d-block">Detail</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="container">
                        <div class="row align-items-center m-3">
                            <div class="col-lg-6 mx-auto text-center">

                                <h1 class="">Tidak ada Pekerja!!</h1>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

    </div>

@endsection
