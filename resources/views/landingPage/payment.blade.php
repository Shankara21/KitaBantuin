@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Payment</h1>
                    <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. </p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="untree_co-section">
    <div class="container">
        <div class="card mb-5 shadow" style="border-radius: 20px">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-3">Detail Project</h3>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12  mb-4">
                                <div class="card shadow" style="border-radius: 20px;background:white">
                                    <div class="card-body">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h3 class="mb-3">Payment</h3>
                        <div class="col-lg-12 col-sm-12  mb-4">
                            <div class="card shadow" style="border-radius: 20px;background:white">
                                <div class="card-body">
                                    <form action="{{ route('submitPayment') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Pilih Metode Pembayaran</label>
                                            <div class="row">
                                                @foreach ($bank as $bank)
                                                <div class="col mb-4 align-self-center">

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="form-check">
                                                                <label class="form-check-label "
                                                                    for="exampleRadios{{ $loop -> iteration }}">
                                                                    @if ($bank -> image)

                                                                    <img src="{{ asset('storage/'.$item -> image) }}"
                                                                        alt="" height="100px"
                                                                        style="object-fit: fill;border-radius: 20px;"
                                                                        class="img-target">
                                                                    @else
                                                                    <img src="{{ asset('landingPage/images/'.$bank -> slug.'.png') }}"
                                                                        alt="" height="100px"
                                                                        style="object-fit: fill;border-radius: 20px;"
                                                                        class="img-target">

                                                                    @endif
                                                                </label>
                                                                <input class="form-check-input d-none opt-radio"
                                                                    type="radio" name="bank_id"
                                                                    id="exampleRadios{{ $loop -> iteration }}"
                                                                    value="{{ $bank->id }}">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-black" for="fname">Bukti Transfer</label>
                                            <input type="file" class="form-control" id="fname" name="bukti_transfer"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label class="text-black" for="nominal">Nominal</label>
                                            <input type="hidden" class="form-control" id="nominal" name="amount"
                                                required readonly value="{{ $bid -> price }}">
                                            <input type="text" class="form-control"
                                                placeholder="Rp.{{ number_format($bid -> price) }}" readonly>
                                            <input type="hidden" name="project_id" value="{{ $project -> id }}">
                                            <input type="hidden" name="user_id" value="{{ Auth::user() -> id }}">
                                            <input type="hidden" name="bid_id" value="{{ $bid -> id }}">
                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn btn-primary w-50">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('script')
    <script>
        const radio = document.querySelectorAll('.opt-radio');
            const target = document.querySelectorAll('.img-target');
        
            radio.forEach(function (item, index) {
                item.addEventListener('click', function () {
                    target.forEach(function (item, index) {
                        item.style.backgroundColor = 'white';
                        item.style.transform = 'scale(1)';
                    });
                    target[index].style.backgroundColor = 'rgba(0,0,0,0.08)';
                    target[index].style.transform = 'scale(1.2)';
                });
            });
    </script>
    @endsection