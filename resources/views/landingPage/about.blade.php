@extends('layouts.landingPage.main')
@section('content')
    <div class="hero hero-inner">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mx-auto text-center">
                    <div class="intro-wrap">
                        <h1 class="mb-0">Tentang Kami</h1>
                        <p class="text-white">KitaBantuin.co merupakan sebuah bisnis berbasis IT yang menyediakan layanan
                            pengerjaan proyek atau pekerjaan yang terkait dengan IT.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="untree_co-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="owl-single dots-absolute owl-carousel">
                        <img src="/landingPage/images/slider-1.jpg" alt="Free HTML Template by Untree.co"
                            class="img-fluid rounded-20">
                        <img src="/landingPage/images/slider-2.jpg" alt="Free HTML Template by Untree.co"
                            class="img-fluid rounded-20">
                        <img src="/landingPage/images/slider-3.jpg" alt="Free HTML Template by Untree.co"
                            class="img-fluid rounded-20">
                        <img src="/landingPage/images/slider-4.jpg" alt="Free HTML Template by Untree.co"
                            class="img-fluid rounded-20">
                        <img src="/landingPage/images/slider-5.jpg" alt="Free HTML Template by Untree.co"
                            class="img-fluid rounded-20">
                        <img src="/landingPage/images/slider-6.jpg" alt="Free HTML Template by Untree.co"
                            class="img-fluid rounded-20">
                    </div>
                </div>
                <div class="col-lg-5 pl-lg-5 ml-auto">
                    <h2 class="section-title mb-4">kITabantuin.co</h2>
                    <p>Fokus utama bisnis ini adalah membantu masyarakat yang tidak memiliki background IT dalam
                        mengembangkan usaha, bisnis, atau pekerjaan mereka sehingga dapat lebih dikenal masyarakat secara
                        luas. Dengan tujuan seperti berikut : </p>
                    <ul class="list-unstyled two-col clearfix">
                        <li>Memberikan wadah bagi mahasiswa IT yang ingin mencari penghasilan tambahan dengan pengaturan jam
                            kerja yang fleksibel</li>
                        <li>Menyediakan platform untuk mewujudkan ide ide orang tanpa keterampilan IT</li>
                        <li>Menyediakan platform jasa dengan harga terjangkau karena resource kami merupakan mahasiswa IT
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="untree_co-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-6 text-center">
                    <h2 class="section-title mb-3 text-center">Tim</h2>
                    <p>Yang melatarbelakangi berdirinya usaha ini adalah adanya fakta bahawa sebagian besar masyarakat
                        indonesia masih belum memiliki kemampuan dan pemahaman mengenai bidang IT. Dengan Anggota Berikut :
                    </p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 mb-4">
                    <div class="team">
                        <img src="/landingPage/images/person_1.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
                        <div class="px-3">
                            <h3 class="mb-0">Judha Maygustya</h3>
                            <p>Project Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="team">
                        <img src="/landingPage/images/person_1.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
                        <div class="px-3">
                            <h3 class="mb-0">Muhammad Lazuardi Timur</h3>
                            <p>Backend Developer</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div class="team">
                        <img src="/landingPage/images/person_1.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
                        <div class="px-3">
                            <h3 class="mb-0">Firgi Sotya Izuddin</h3>
                            <p>Frontend Developer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-4">
                    <div class="team">
                        <img src="/landingPage/images/person_3.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
                        <div class="px-3">
                            <h3 class="mb-0">Mahisa Aghisni</h3>
                            <p>Quality Assurace</p>
                        </div>
                    </div>
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
                    <h2 class="section-title text-left mb-4">Bahasa Pemrograman</h2>
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

                    <p><a href="#" class="btn btn-primary">Get Started</a></p>


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
                    <p class="mb-0"><a href="booking.html"
                            class="btn btn-outline-white text-white btn-md font-weight-bold">Get in touch</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
