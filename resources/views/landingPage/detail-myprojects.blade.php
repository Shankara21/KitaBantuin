@extends('layouts.landingPage.main')
@section('css')
<style>
    /*styling star rating*/
    .rating {
        border: none;
        float: left;
    }

    .rating input {
        display: none;
    }

    .rating label:before {
        content: '\f005';
        font-family: FontAwesome;
        margin: 5px;
        font-size: 1.5rem;
        display: inline-block;
        cursor: pointer;
    }

    .rating .half:before {
        content: '\f089';
        position: absolute;
        cursor: pointer;
    }


    .rating label {
        color: #ddd;
        float: right;
        cursor: pointer;
    }

    .rating input:checked~label,
    .rating:not(:checked)>label:hover,
    .rating:not(:checked)>label:hover~label {
        color: #ffd700;
    }

    .rating input:checked+label:hover,
    .rating input:checked~label:hover,
    .rating label:hover~input:checked~label,
    .rating input:checked~label:hover~label {
        color: #ffd700;
    }
</style>
@endsection
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Detail Project </h1>
                    <p class="text-white">Menampilkan Detail project yang telah di buat oleh user </p>
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
                            @if ($project -> status == 'Done')
                            <p class="bg-success p-2 " style="border-radius: 30px"><i
                                    class="fa-regular fa-circle-check"></i>
                                Done
                            </p>
                            @else
                            <p class="bg-info p-2 " style="border-radius: 30px"><i class="fa-regular fa-clock"></i>
                                Sisa : {{ $day }} hari
                            </p>
                            @endif
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
                                                <a href="{{ route('detailWorker', $item -> user -> name) }}"
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
                                <a href="/getPayment/{{ $oneBid -> id }}" class="btn btn-primary mb-3">Lakukan
                                    Pembayaran</a>
                                @else
                                <a href="{{ $projectResult -> link }}" target="_blank"
                                    class="btn btn-primary mb-3">kunjungi file</a>
                                @endif
                                @if ($payment)
                                @if (!$testimoni)
                                    <h4>Penilaian : </h4>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                                        Berikan penilaian
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
                                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Berikan Penilaian</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="/submit-testimoni" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <h6 class="text-center">Berikan Rating:</h6>
                                                        <div class="d-flex justify-content-center m-0">
                                                            <fieldset class="rating" id="rating-select">
                                                                <input type="radio" id="star5" name="rating" value="5" /><label for="star5" class="full"
                                                                    title="Awesome"></label>
                                                                <input type="radio" id="star4.5" name="rating" value="4.5" /><label for="star4.5"
                                                                    class="half"></label>
                                                                <input type="radio" id="star4" name="rating" value="4" /><label for="star4"
                                                                    class="full"></label>
                                                                <input type="radio" id="star3.5" name="rating" value="3.5" /><label for="star3.5"
                                                                    class="half"></label>
                                                                <input type="radio" id="star3" name="rating" value="3" /><label for="star3"
                                                                    class="full"></label>
                                                                <input type="radio" id="star2.5" name="rating" value="2.5" /><label for="star2.5"
                                                                    class="half"></label>
                                                                <input type="radio" id="star2" name="rating" value="2" /><label for="star2"
                                                                    class="full"></label>
                                                                <input type="radio" id="star1.5" name="rating" value="1.5" /><label for="star1.5"
                                                                    class="half"></label>
                                                                <input type="radio" id="star1" name="rating" value="1" /><label for="star1"
                                                                    class="full"></label>
                                                                <input type="radio" id="star0.5" name="rating" value="0.5" /><label for="star0.5"
                                                                    class="half"></label>
                                                            </fieldset>
                                                        </div>
                                                        <input type="hidden" class="form-control rating" id="rating" name="rating" />
                                                        <input type="hidden" name="project_id" value="{{ $project -> id }}">
                                                        <input type="hidden" name="worker_id" value="{{ $project -> worker_id }}">
                                                        <div class="form-group">
                                                            <label for="testimoni">Testimoni</label>
                                                            <textarea class="form-control" id="testimoni" cols="30" rows="3" name="description"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
@include('sweetalert::alert')
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
    crossorigin="anonymous"></script>
<script>
    $('#rating-select input').change(function() {
                var rating = $('#rating-select input:checked').map(function() {
                    return this.value;
                }).get();
                $('#rating').val((rating.length > 0 ? rating : ""));
            });
</script>
@endsection
