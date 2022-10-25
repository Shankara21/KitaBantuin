@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">About Us</h1>
                    <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. </p>
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
                </div>
            </div>
            <div class="col-lg-5 pl-lg-5 ml-auto">
                <h2 class="section-title mb-4">About Tours</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                    language ocean.</p>
                <ul class="list-unstyled two-col clearfix">
                    <li>Outdoor recreation activities</li>
                    <li>Airlines</li>
                    <li>Car Rentals</li>
                    <li>Cruise Lines</li>
                    <li>Hotels</li>
                    <li>Railways</li>
                    <li>Travel Insurance</li>
                    <li>Package Tours</li>
                    <li>Insurance</li>
                    <li>Guide Books</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-6 text-center">
                <h2 class="section-title mb-3 text-center">Team</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                    language ocean.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 mb-4">
                <div class="team">
                    <img src="/landingPage/images/person_1.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
                    <div class="px-3">
                        <h3 class="mb-0">James Watson</h3>
                        <p>Co-Founder &amp; CEO</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="team">
                    <img src="/landingPage/images/person_2.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
                    <div class="px-3">
                        <h3 class="mb-0">Carl Anderson</h3>
                        <p>Co-Founder &amp; CEO</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 mb-4">
                <div class="team">
                    <img src="/landingPage/images/person_4.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
                    <div class="px-3">
                        <h3 class="mb-0">Michelle Allison</h3>
                        <p>Co-Founder &amp; CEO</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="team">
                    <img src="/landingPage/images/person_3.jpg" alt="Image" class="img-fluid mb-4 rounded-20">
                    <div class="px-3">
                        <h3 class="mb-0">Drew Wood</h3>
                        <p>Co-Founder &amp; CEO</p>
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
                <h2 class="section-title text-center mb-5">Testimonials</h2>

                <div class="owl-single owl-carousel no-nav">
                    @forelse ($testimonis as $item)
                    <div class="testimonial mx-auto">
                        <figure class="img-wrap">
                            @if ($item->photo)
                            <img src="{{ asset('storage/'. $item -> photo) }}" alt="" class="img-fluid">
                            @elseif (!$item -> photo && $item -> gender == 'Laki-laki')
                            <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt="" class="img-fluid">
                            @elseif (!$item -> photo && $item -> gender == 'Perempuan')
                            <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt="" class="img-fluid">
                            @else
                            <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt="" class="img-fluid">
                            @endif
                        </figure>
                        <h3 class="name">{{ $item -> user -> name }}</h3>
                        <blockquote>
                            <p>&ldquo;{{ $item -> description }}&rdquo;</p>
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
                <h2 class="section-title text-left mb-4">Take a look at Tour Video</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live
                    the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large
                    language ocean.</p>

                <p class="mb-4">A small river named Duden flows by their place and supplies it with the necessary
                    regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
                </p>

                <ul class="list-unstyled two-col clearfix">
                    <li>Outdoor recreation activities</li>
                    <li>Airlines</li>
                    <li>Car Rentals</li>
                    <li>Cruise Lines</li>
                    <li>Hotels</li>
                    <li>Railways</li>
                    <li>Travel Insurance</li>
                    <li>Package Tours</li>
                    <li>Insurance</li>
                    <li>Guide Books</li>
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
                <h2 class="mb-2 text-white">Lets you Explore the Best. Contact Us Now</h2>
                <p class="mb-4 lead text-white text-white-opacity">Lorem ipsum dolor sit amet, consectetur adipisicing
                    elit. Excepturi, fugit?</p>
                <p class="mb-0"><a href="booking.html"
                        class="btn btn-outline-white text-white btn-md font-weight-bold">Get in touch</a></p>
            </div>
        </div>
    </div>
</div>
@endsection