@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Detail Project </h1>
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
            <div class="col-12 mb-2">
                <div class="card shadow" style="border-radius: 20px;background:white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h1>{{ $project -> title }}</h1>
                            <p class="bg-info p-2 " style="border-radius: 30px"><i class="fa-regular fa-clock"></i>
                                Sisa : {{ $day }} hari
                            </p>
                        </div>
                        <p>
                            {!! $project -> description !!}
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
                                    <span class="text-muted">{{ $project-> budget }}</span>
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6 class=" pl-5">Deadline :
                                    <span class="text-muted">{{ $project-> deadline }}</span>
                                </h6>
                            </div>
                            <div class="col-6">
                                <h6 class="text-bold pl-5">Status :
                                    <span class="text-muted">{{ $project -> status }}</span>
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

            @if ($project -> status == 'Open')
            <div class="col-12 mb-4">
                <div class="card shadow" style="border-radius: 20px;background:white">
                    <div class="card-body">
                        <h3>User Bids</h3>
                        <div class="container">
                            <div class="row">
                                @forelse ($bid as $item)
                                <div class="col-5  p-2 shadow m-3" style="border-radius: 20px">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="d-flex justify-content-center ">
                                                @if ($item -> user -> photo)
                                                <img src="{{ asset('storage/'. $item -> user -> photo) }}" alt=""
                                                    class="mg-fluid img-thumbnail rounded-circle w-100 mb-4 align-self-center">
                                                @elseif (!$item -> user -> photo && $item -> user -> gender ==
                                                'Laki-Laki')
                                                <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt=""
                                                    class="mg-fluid img-thumbnail rounded-circle w-100 mb-4 align-self-center">
                                                @elseif (!$item -> user -> photo && $item -> user -> gender ==
                                                'Perempuan')
                                                <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt=""
                                                    class="mg-fluid img-thumbnail rounded-circle w-100 mb-4 align-self-center">
                                                @else
                                                <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt=""
                                                    class="mg-fluid img-thumbnail rounded-circle w-100 mb-4 align-self-center">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="d-block">
                                                <p>{{ $item -> user -> name }}</p>
                                                <p>Rp.{{ number_format($item -> price) }}</p>
                                            </div>
                                            <div class="">
                                                <form action="{{ route('acceptBid', $item -> user -> id) }}"
                                                    class="d-inline" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="worker_id"
                                                        value="{{ $item -> user -> id }}">
                                                    <input type="hidden" name="project_id" value="{{ $project -> id }}">
                                                    <input type="hidden" name="bid_id" id="" value="{{ $item -> id }}">
                                                    <button type="submit" class="btn btn-success p-2"><i
                                                            class="fa-solid fa-circle-check"></i> Accept</button>
                                                </form>
                                                <a href="{{ route('detailWorker', $item -> user -> id) }}"
                                                    class="btn btn-info p-2">
                                                    <i class="fa-solid fa-circle-info"></i>
                                                    Details</a>
                                            </div>
                                        </div>
                                    </div>
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
            @elseif ($project -> status == 'onProcess' || $project -> status == 'Done')
            <div class="col-12 mb-4">
                <div class="card shadow" style="border-radius: 20px;background:white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h2>Worker : </h2>
                                <h5>Worker Name : {{ $project -> worker -> name }}</h5>
                                <h6>Worker Email : {{ $project -> worker -> email }}</h6>
                                <h6>Worker Phone : {{ $project -> worker -> phone }}</h6>
                                <p>Harga disetujui: Rp.{{ number_format($oneBid -> price) }}</p>
                            </div>
                            @if ($projectResult)
                            <div class="col-sm-6">
                                <h2>Project Result : </h2>
                                <h4>Hasil Pengerjaan : </h4>
                                <img src="{{ asset('storage/'.$projectResult -> image) }}" class="img-fluid mb-3" alt=""
                                    style="border-radius: 20px;
                                    @if(!$payment)
                                    filter: blur(10px);
                                    -webkit-filter: blur(10px);
                                    @endif">
                                <h4>Link File : </h4>
                                @if (!$payment)
                                <a href="/getPayment/{{ $oneBid -> id }}" class="btn btn-primary">Lakukan Pembayaran</a>
                                @else
                                <a href="{{ $projectResult -> link }}" target="_blank" class="btn btn-primary">kunjungi file</a>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @else
            @endif
        </div>
    </div>
</div>
@endsection