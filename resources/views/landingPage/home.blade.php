@extends('layouts.landingPage.main')
@section('content')
    @include('sweetalert::alert')

    <div class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="intro-wrap">
                        <h1 class="mb-5"><span class="d-block">Ayo Build Project Anda</span> Dengan <span
                                class="typed-words"></span>
                        </h1>

                        <div class="row">
                            <div class="col-12">
                                <form class="form" action="{{ route('list-project') }}">
                                    <div class="row mb-2">
                                        <div class="col-6">
                                            <label for="categories">Pilih kategori</label>
                                            <select name="filter_category" id="categories"
                                                class="form-control custom-select">
                                                @foreach ($subCategories as $item)
                                                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <label for="tanggal">Batas waktu</label>
                                            <input type="date" id="tanggal" class="form-control" name="deadline">
                                        </div>
                                    </div>
                                    <div class="row align-items-center">
                                        <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4">
                                            <input type="submit" class="btn btn-primary btn-block" value="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="slides">
                        <img src="/landingPage/images/hero-slider-1.jpg" alt="Image" class="img-fluid active">
                        <img src="/landingPage/images/hero-slider-2.jpg" alt="Image" class="img-fluid">
                        <img src="/landingPage/images/hero-slider-3.jpg" alt="Image" class="img-fluid">
                        <img src="/landingPage/images/hero-slider-4.jpg" alt="Image" class="img-fluid">
                        <img src="/landingPage/images/hero-slider-5.jpg" alt="Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="untree_co-section">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-lg-6 text-center">
                    <h2 class="section-title text-center mb-3">Layanan kami</h2>
                    <p>KitaBantuin.co merupakan sebuah bisnis berbasis IT yang menyediakan layanan pengerjaan proyek atau
                        pekerjaan yang terkait pada bidang IT dengan mendapatkan layanan dan feedback bagi pelanggan
                        kITabantuin.co seperti berikut : </p>
                </div>
            </div>
            <div class="row align-items-stretch">
                <div class="col-lg-4 order-lg-1">
                    <div class="h-100">
                        <div class="frame h-100">
                            <div class="feature-img-bg h-100"
                                style="background-image: url('/landingPage/images/hero-slider-1.jpg');">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-1">

                    <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <img src="/landingPage/icons/video.png" alt="" height="60px">
                            <h3>Konferensi Video</h3>
                            <p class="mb-0">Kami juga akan memberikan fasilitas video conference yang dapat digunakan bagi
                                client dan worker untuk melakukan komunikasi , baik membahas project yang sedang di kerjakan
                                , ataupun mngajukan pertanyaan – pertanyaan terkait fitur yang ada pada project tersebut.
                            </p>
                        </div>
                    </div>

                    <div class="feature-1 ">
                        <div class="align-self-center">
                            <span class="flaticon-phone-call display-4 text-primary"></span>
                            <h3>Pelatihan</h3>
                            <p class="mb-0">Kami akan memberikan training dan tahap seleksi kepada seluruh pendaftar
                                (worker) agar kami memiliki worker yang berkualitas dan dapat di andalakan , sehingga
                                project project yang di ajukan oleh client dapat terselesaikan dengan baik dan tepat waktu ,
                                sehingga akan memberikan kepuasan bagi client yang menggunakan layanan dari platform ini.
                            </p>
                        </div>
                    </div>

                </div>

                <div class="col-6 col-sm-6 col-lg-4 feature-1-wrap d-md-flex flex-md-column order-lg-3">

                    <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <span class="flaticon-mail display-4 text-primary"></span>
                            <h3>Ketentuan Perjanjian Layanan</h3>
                            <p class="mb-0">Kami juga akan memberikan terms of service agreement bagi worker dan juga
                                client pada saat awal mendaftarkan akun di platform ini , sehingga akan tercipta suasana
                                kondusif dan menimbulkan rasa saling percaya baik dari worker ataupun client
                            </p>
                        </div>
                    </div>

                    {{-- <div class="feature-1 d-md-flex">
                        <div class="align-self-center">
                            <span class="flaticon-phone-call display-4 text-primary"></span>
                            <h3>24/7 Support</h3>
                            <p class="mb-0">Even the all-powerful Pointing has no control about the blind texts.</p>
                        </div>
                    </div> --}}

                </div>

            </div>
        </div>
    </div>

    <div class="untree_co-section count-numbers py-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="9313">0</span>
                        </div>
                        <span class="caption">Total Pelanggan</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="8492">0</span>
                        </div>
                        <span class="caption">Tugas Diselesaikan</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="100">0</span>
                        </div>
                        <span class="caption">Tim Profesional</span>
                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                    <div class="counter-wrap">
                        <div class="counter">
                            <span class="" data-number="120">0</span>
                        </div>
                        <span class="caption">Universitas Berbeda</span>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="untree_co-section">
        <div class="container">
            <div class="row text-center justify-content-center mb-5">
                <div class="col-lg-7">
                    <h2 class="section-title text-center">Popular Frameworks</h2>
                </div>
            </div>

            <div class="owl-carousel owl-3-slider">

                <div class="item">
                    <a class="media-thumb" href="images/hero-slider-1.jpg" data-fancybox="gallery">
                        <div class="media-text">
                            <h3 class="text-white">Pragser Wildsee</h3>
                            <span class="location text-white">Polinema</span>
                        </div>
                        <img src="/landingPage/images/hero-slider-1.jpg" alt="Image" class="img-fluid">
                    </a>
                </div>

                <div class="item">
                    <a class="media-thumb" href="images/hero-slider-2.jpg" data-fancybox="gallery">
                        <div class="media-text">
                            <h3 class="text-white">Oia</h3>
                            <span class="location text-white">Polinema</span>
                        </div>
                        <img src="/landingPage/images/hero-slider-2.jpg" alt="Image" class="img-fluid">
                    </a>
                </div>

                <div class="item">
                    <a class="media-thumb" href="images/hero-slider-3.jpg" data-fancybox="gallery">
                        <div class="media-text">
                            <h3 class="text-white">Laravel</h3>
                            <span class="location text-white">Polinema</span>
                        </div>
                        <img src="/landingPage/images/hero-slider-3.jpg" alt="Image" class="img-fluid">
                    </a>
                </div>


                <div class="item">
                    <a class="media-thumb" href="images/hero-slider-4.jpg" data-fancybox="gallery">
                        <div class="media-text">
                            <h3 class="text-white">Django</h3>
                            <span class="location text-white">Polinema</span>
                        </div>
                        <img src="/landingPage/images/hero-slider-4.jpg" alt="Image" class="img-fluid">
                    </a>
                </div>

                <div class="item">
                    <a class="media-thumb" href="images/hero-slider-5.jpg" data-fancybox="gallery">
                        <div class="media-text">
                            <h3 class="text-white">React.js</h3>
                            <span class="location text-white">Polinema</span>
                        </div>
                        <img src="/landingPage/images/hero-slider-5.jpg" alt="Image" class="img-fluid">
                    </a>
                </div>

                <div class="item">
                    <a class="media-thumb" href="images/hero-slider-1.jpg" data-fancybox="gallery">
                        <div class="media-text">
                            <h3 class="text-white">Vue.js</h3>
                            <span class="location text-white">Polinema</span>
                        </div>
                        <img src="/landingPage/images/hero-slider-2.jpg" alt="Image" class="img-fluid">
                    </a>
                </div>

            </div>

        </div>
    </div>


    <div class="untree_co-section testimonial-section mt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <h2 class="section-title text-center mb-5">Testimoni</h2>

                    <div class="owl-single owl-carousel no-nav">
                        @forelse ($testimonis as $item)
                            <div class="testimonial mx-auto">
                                <figure class="img-wrap">
                                    @if ($item->photo)
                                        <img src="{{ asset('storage/' . $item->photo) }}" alt=""
                                            class="img-fluid">
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


    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6">
                    <h2 class="section-title text-center mb-3">Penawaran khusus &amp; Diskon</h2>
                    <p>Harga layanan yang kami berikan jauh lebih terjangkau dibandingkan dengan kompetitor , karena
                        dengan alasan resource yang kami gunakan adalah rekan rekan mahasiswa IT , sementara itu competitor
                        menggunakan resource tenaga ahli
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="media-1">
                        <a href="#" class="d-block mb-3"><img src="/landingPage/images/hero-slider-1.jpg"
                                alt="Image" class="img-fluid"></a>
                        <span class="d-flex align-items-center loc mb-2">
                            <span class="icon-room mr-3"></span>
                            <span>Polinema</span>
                        </span>
                        <div class="d-flex align-items-center">
                            <div>
                                <h3><a href="#">PHP</a></h3>
                                <div class="price ml-auto">
                                    <span>Rp. 100.000.00</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="media-1">
                        <a href="#" class="d-block mb-3"><img src="/landingPage/images/hero-slider-2.jpg"
                                alt="Image" class="img-fluid"></a>
                        <span class="d-flex align-items-center loc mb-2">
                            <span class="icon-room mr-3"></span>
                            <span>Polinema</span>
                        </span>
                        <div class="d-flex align-items-center">
                            <div>
                                <h3><a href="#">Python</a></h3>
                                <div class="price ml-auto">
                                    <span>Rp. 150.000.00</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="media-1">
                        <a href="#" class="d-block mb-3"><img src="/landingPage/images/hero-slider-3.jpg"
                                alt="Image" class="img-fluid"></a>
                        <span class="d-flex align-items-center loc mb-2">
                            <span class="icon-room mr-3"></span>
                            <span>Polinema</span>
                        </span>
                        <div class="d-flex align-items-center">
                            <div>
                                <h3><a href="#">JavaScript</a></h3>
                                <div class="price ml-auto">
                                    <span>Rp. 90.000.00</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="media-1">
                        <a href="#" class="d-block mb-3"><img src="/landingPage/images/hero-slider-4.jpg"
                                alt="Image" class="img-fluid"></a>

                        <span class="d-flex align-items-center loc mb-2">
                            <span class="icon-room mr-3"></span>
                            <span>Polinema</span>
                        </span>

                        <div class="d-flex align-items-center">
                            <div>
                                <h3><a href="#">Java</a></h3>
                                <div class="price ml-auto">
                                    <span>Rp. 80.000.00</span>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-between align-items-center">

                <div class="col-lg-6">
                    <figure class="img-play-video">
                        <a id="play-video" class="video-play-button" href="https://www.youtube.com/watch?v=mwtbEGNABWU"
                            data-fancybox>
                            <span></span>
                        </a>
                        <img src="/landingPage/images/hero-slider-2.jpg" alt="Image" class="img-fluid rounded-20">
                    </figure>
                </div>

                <div class="col-lg-5">
                    <h2 class="section-title text-left mb-4">Bahasa pemrograman</h2>
                    <p>Bahasa pemrograman merupakan untaian kata-kata berupa instruksi atau perintah-perintah yang biasanya
                        terdiri dari banyak baris yang bisa dimengerti oleh komputer. Bahasa pemrograman ini wajib dikuasai
                        oleh seorang developer agar dapat membangun sebuah aplikasi atau software. Dan untuk membuat
                        aplikasi tertentu maka digunakan juga bahasa pemrograman yang sesuai dengan kebutuhan aplikasi yang
                        akan dibuat tersebut.</p>

                    <ul class="list-unstyled two-col clearfix">
                        <li>Java</li>
                        <li>PHP</li>
                        <li>JavaScript</li>
                        <li>Python</li>
                        <li>C++</li>
                        <li>C</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 cta-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-12">
                    <h2 class="mb-2 text-white">Ayo coding di kITabantuin.co</h2>
                    <p class="mb-4 lead text-white text-white-opacity">Kirimkan project anda agar beban anda berkurang</p>
                    <p class="mb-0"><a href="/list-project"
                            class="btn btn-outline-white text-white btn-md font-weight-bold">Cari Proyek</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            var slides = $('.slides'),
                images = slides.find('img');

            images.each(function(i) {
                $(this).attr('data-id', i + 1);
            })

            var typed = new Typed('.typed-words', {
                strings: ["Flutter.", " Laravel.", " ReactJs.", " VueJs.", " Golang."],
                typeSpeed: 80,
                backSpeed: 80,
                backDelay: 4000,
                startDelay: 1000,
                loop: true,
                showCursor: true,
                preStringTyped: (arrayPos, self) => {
                    arrayPos++;
                    console.log(arrayPos);
                    $('.slides img').removeClass('active');
                    $('.slides img[data-id="' + arrayPos + '"]').addClass('active');
                }

            });
        })
    </script>
@endsection
