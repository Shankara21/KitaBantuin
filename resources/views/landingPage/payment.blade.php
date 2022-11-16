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
                                        <h3>{{ $project -> title }}</h3>
                                        <div class="card shadow mb-3" style="border-radius: 20px;background:white">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <h6 class="text-muted">Category :
                                                            <span
                                                                class="text-black">{{ $project -> sub_categories }}</span>
                                                        </h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h6 class="text-muted">Budget : <span
                                                                class="text-black">{{ $project -> budget }}</span></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h6 class="text-muted">Finished :
                                                            <span
                                                                class="text-black">{{ $project -> created_at -> format('Y-m-d') }}</span>
                                                        </h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <h6 class="text-muted">Deadline : <span
                                                                class="text-black">{{ $project -> deadline }}</span>
                                                        </h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <p>
                                            {!! $project -> excerpt !!}
                                        </p>
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

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12  mb-4">
                            <div class="card shadow" style="border-radius: 20px;background:white">
                                <div class="card-body">
                                    @if (count($errors) > 0)
                                    <div class="mx-3 alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <form action="{{ route('submitPayment') }}" method="POST"
                                        enctype="multipart/form-data">
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
                                        <div class="row">
                                            <div class="col-sm-2"></div>

                                        </div>
                                        {{-- <div class="row mb-3 align-items-center">
                                            <label class="col-sm-2 col-form-label" for="photo">Photo</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" id="photo" placeholder="Photo"
                                                    name="photo" required onchange="previewImage()" />
                                            </div>
                                        </div> --}}
                                        <div class="form-group mb-3">
                                            <label class="text-black d-block" for="fname">Bukti Transfer</label>
                                            <img class="img-preview mb-3 w-100" style="border-radius: 20px">
                                            <input type="file" class="form-control" id="photo" placeholder="Photo"
                                                name="bukti_transfer" required onchange="previewImage()" />
                                        </div>
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between m-3">
                                                <h5>Jumlah Tagihan</h5>
                                                <h5>:</h5>
                                                <h5>Rp.{{ number_format($bid -> price) }}</h5>
                                            </div>
                                            <input type="hidden" class="form-control" id="nominal" name="amount"
                                                required readonly value="{{ $bid -> price }}">
                                            {{-- <input type="text" class="form-control"
                                                placeholder="Rp.{{ number_format($bid -> price) }}" readonly> --}}
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
<script>
    function previewImage(){
                        const image = document.querySelector('#photo');
                        const imgPreview = document.querySelector('.img-preview');

                        imgPreview.style.width = '150px';

                        const oFReader = new FileReader();
                        oFReader.readAsDataURL(image.files[0]);

                        oFReader.onload = function(oFREvent){
                          imgPreview.src = oFREvent.target.result;
                        }
                      }

                      document.addEventListener('trix-file-accept', function(e){
                        e.preventDefault()
                      })
</script>
@endsection
