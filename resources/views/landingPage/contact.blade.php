@extends('layouts.landingPage.main')
@section('content')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Kontak Kami</h1>
                        <p class="text-white">Dengan Kontak kami kita dapat berhubungan dengan admin atau client
                            website kita </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <form class="contact-form" data-aos="fade-up" data-aos-delay="200">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-black" for="fname">Nama awal</label>
                                    <input type="text" class="form-control" id="fname">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="text-black" for="lname">Nama akhir</label>
                                    <input type="text" class="form-control" id="lname">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="text-black" for="email">Alamat Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>

                        <div class="form-group">
                            <label class="text-black" for="message">Pesan</label>
                            <textarea name="" class="form-control" id="message" cols="30" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                    </form>
                </div>
                <div class="col-lg-5 ml-auto">
                    <div class="quick-contact-item d-flex align-items-center mb-4">
                        <span class="flaticon-house"></span>
                        <address class="text">
                            Jl.Pisang Kipas Kec.Lowokwaru Kab.Malang Jawa Timur
                        </address>
                    </div>
                    <div class="quick-contact-item d-flex align-items-center mb-4">
                        <span class="flaticon-phone-call"></span>
                        <address class="text">
                            +62 896 7905 1179
                        </address>
                    </div>
                    <div class="quick-contact-item d-flex align-items-center mb-4">
                        <span class="flaticon-mail"></span>
                        <address class="text">
                            kitabantuin@gmail.com
                        </address>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="untree_co-section testimonial-section mt-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <h2 class="section-title text-center mb-5">Testimoni</h2>

                    <div class="owl-single owl-carousel no-nav">
                        @forelse ($testimonis as $item)
                            <div class="testimonial mx-auto">
                                <figure class="img-wrap">
                                    @if ($item->photo)
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt="" class="img-fluid">
                                    @elseif (!$item->photo && $item->gender == 'Laki-Laki')
                                        <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt=""
                                            class="img-fluid">
                                    @elseif (!$item->photo && $item->gender == 'Perempuan')
                                        <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt=""
                                            class="img-fluid">
                                    @else
                                        <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt=""
                                            class="img-fluid">
                                    @endif
                                </figure>
                                <h3 class="name">{{ $item->user->name }}</h3>
                                <blockquote>
                                    <p>&ldquo;{{ $item->description }}&rdquo;</p>
                                </blockquote>
                            </div>
                        @empty
                        @endforelse

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
