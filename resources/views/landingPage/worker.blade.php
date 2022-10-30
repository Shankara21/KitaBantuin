@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Our Worker</h1>
                    <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section" style="background: #F8F9FA">
    <div class="container">
        <!-- Button trigger modal -->

        <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-primary p-2 my-4 " data-toggle="modal" data-target="#staticBackdrop">
                Ingin jadi worker?
            </button>
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
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-sm-12  mb-4">
                <div class="card shadow" style="border-radius: 20px;background:white">

                    <div class="p-2 d-flex justify-content-center">
                        <img src="/landingPage/images/person_1.jpg" alt="Image"
                            class="img-fluid img-thumbnail rounded-circle w-50 ">
                    </div>

                    <div class="card-body">
                        <h5>Muhammad lazuardi Tmur</h5>
                        <p class="text-muted mb-4">Fullstack Developer</p>
                        <div class="mb-4">
                            <div class="owl-single dots-absolute owl-carousel">
                                <img src="/landingPage/images/slider-1.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                                <img src="/landingPage/images/slider-2.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                                <img src="/landingPage/images/slider-4.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                            </div>
                        </div>
                        <a href="/chat" class="btn btn-primary d-block mb-2">Chat</a>
                        <a href="/details" class="btn btn-secondary d-block">Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card shadow" style="border-radius: 20px;background:white">

                    <div class="p-2 d-flex justify-content-center">
                        <img src="/landingPage/images/person_1.jpg" alt="Image"
                            class="img-fluid img-thumbnail rounded-circle w-50 ">
                    </div>

                    <div class="card-body">
                        <h5>Muhammad lazuardi Tmur</h5>
                        <p class="text-muted mb-4">Fullstack Developer</p>
                        <div class="mb-4">
                            <div class="owl-single dots-absolute owl-carousel">
                                <img src="/landingPage/images/slider-1.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                                <img src="/landingPage/images/slider-2.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                                <img src="/landingPage/images/slider-4.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                            </div>
                        </div>
                        <a href="/chat" class="btn btn-primary d-block mb-2">Chat</a>
                        <a href="/details" class="btn btn-secondary d-block">Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card shadow" style="border-radius: 20px;background:white">

                    <div class="p-2 d-flex justify-content-center">
                        <img src="/landingPage/images/person_1.jpg" alt="Image"
                            class="img-fluid img-thumbnail rounded-circle w-50 ">
                    </div>

                    <div class="card-body">
                        <h5>Muhammad lazuardi Tmur</h5>
                        <p class="text-muted mb-4">Fullstack Developer</p>
                        <div class="mb-4">
                            <div class="owl-single dots-absolute owl-carousel">
                                <img src="/landingPage/images/slider-1.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                                <img src="/landingPage/images/slider-2.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                                <img src="/landingPage/images/slider-4.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                            </div>
                        </div>
                        <a href="/chat" class="btn btn-primary d-block mb-2">Chat</a>
                        <a href="/details" class="btn btn-secondary d-block">Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card shadow" style="border-radius: 20px;background:white">

                    <div class="p-2 d-flex justify-content-center">
                        <img src="/landingPage/images/person_1.jpg" alt="Image"
                            class="img-fluid img-thumbnail rounded-circle w-50 ">
                    </div>

                    <div class="card-body">
                        <h5>Muhammad lazuardi Tmur</h5>
                        <p class="text-muted mb-4">Fullstack Developer</p>
                        <div class="mb-4">
                            <div class="owl-single dots-absolute owl-carousel">
                                <img src="/landingPage/images/slider-1.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                                <img src="/landingPage/images/slider-2.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                                <img src="/landingPage/images/slider-4.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                            </div>
                        </div>
                        <a href="/chat" class="btn btn-primary d-block mb-2">Chat</a>
                        <a href="/details" class="btn btn-secondary d-block">Details</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 mb-4">
                <div class="card shadow" style="border-radius: 20px;background:white">

                    <div class="p-2 d-flex justify-content-center">
                        <img src="/landingPage/images/person_1.jpg" alt="Image"
                            class="img-fluid img-thumbnail rounded-circle w-50 ">
                    </div>

                    <div class="card-body">
                        <h5>Muhammad lazuardi Tmur</h5>
                        <p class="text-muted mb-4">Fullstack Developer</p>
                        <div class="mb-4">
                            <div class="owl-single dots-absolute owl-carousel">
                                <img src="/landingPage/images/slider-1.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                                <img src="/landingPage/images/slider-2.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                                <img src="/landingPage/images/slider-4.jpg" alt="Free HTML Template by Untree.co"
                                    class="img-fluid" style="border-radius: 25px">
                            </div>
                        </div>
                        <a href="/chat" class="btn btn-primary d-block mb-2">Chat</a>
                        <a href="/details" class="btn btn-secondary d-block">Details</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection