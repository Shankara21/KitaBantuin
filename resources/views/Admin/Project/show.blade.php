@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="m-3">
                <a href="{{ route('workers.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Project Detail</strong></h5>
                <small class="text-muted float-end">Categories : <span>{{ $project -> sub_categories }}</span></small>
            </div>
            <div class="mx-3">
                <div class="nav-align-top mb-4">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">

                            <h3 class="text-center">{{ $project -> title }}</h3>
                            <p>
                                {{ $project -> description }}
                            </p>
                            <div class="card m-2 p-2 text-center">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12">
                                        <h5>Deadline
                                            <span class="text-muted">:
                                                {{ $project -> deadline }}
                                            </span>
                                        </h5>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <h5>Budget
                                            <span class="text-muted">:
                                                {{ $project -> budget }}
                                            </span>
                                        </h5>
                                    </div>
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