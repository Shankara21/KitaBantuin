@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Projects</h1>
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
            <div class="col-12 mb-4">
                <div class="card shadow" style="border-radius: 20px;background:white">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-2">
                                <img src="/landingPage/images/person_1.jpg" alt="Image"
                                    class="img-fluid img-thumbnail rounded-circle w-100 mb-4">
                            </div>
                            <div class="col-lg-10">
                                <h5>Membuat Template Bootstrap 5</h5>
                                <p class="text-muted">Web Development</p>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam laborum animi aperiam,
                                    sint ipsam numquam vitae, esse eius molestiae ea vel voluptatum enim! Eveniet,
                                    provident?...</p>
                                <div class="card mb-3 shadow" style="border-radius: 20px">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-6">
                                                <h6 class="text-bold pl-5">Budget :
                                                    <span class="text-muted">Rp.750.000</span>
                                                </h6>
                                            </div>
                                            <div class="col-6">
                                                <h6 class=" pl-5">Deadline :
                                                    <span class="text-muted">12-12-2022</span>
                                                </h6>
                                            </div>
                                            <div class="col-6">
                                                <h6 class="text-bold pl-5">Total Bid :
                                                    <span class="text-muted">12</span>
                                                </h6>
                                            </div>
                                            <div class="col-6">
                                                <h6 class=" pl-5">Deadline :
                                                    <span class="text-muted">12-12-2022</span>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <a href="/detail-project" class="btn btn-primary mx-1 px-3 py-2">
                                        Details
                                    </a>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-secondary mx-1 px-3 py-2" data-toggle="modal"
                                        data-target="#staticBackdrop">
                                        Bid
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-backdrop="static"
                                        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Bid Project</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    ...
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Understood</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <a href="" class="btn btn-secondary mx-1 px-3 py-2">
                                        Bid
                                    </a> --}}
                                    <a href="" class="btn btn-info mx-1 px-3 py-2">
                                        Chat
                                    </a>
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