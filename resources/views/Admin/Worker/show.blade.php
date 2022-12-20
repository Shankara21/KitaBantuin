@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="m-3">
                <a href="{{ route('workers.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Worker Detail</strong></h5>
                <small class="text-muted float-end">user Table</small>
            </div>
            <div class="mx-3">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                                aria-selected="true">
                                <i class="tf-icons bx bx-user"></i> About
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-profile"
                                aria-controls="navs-pills-justified-profile" aria-selected="false">
                                <i class="fa-solid fa-folder-open"></i> Portofolio
                            </button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-messages"
                                aria-controls="navs-pills-justified-messages" aria-selected="false">
                                <i class="fa-solid fa-list-check"></i> Project
                                @if ($amount > 0)
                                <span
                                    class="badge rounded-pill badge-center h-px-20 w-px-20 bg-danger">{{ $amount }}</span>
                                @endif
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="navs-pills-justified-home" role="tabpanel">
                            <div class="card">
                                <div class="table-responsive text-nowrap">
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td colspan="2" class="text-center">
                                                    <img src="{{ asset('storage/'. $user -> photo) }}" alt=""
                                                        width="150px" class="mb-5 img-thumbnail rounded m-auto">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4>Name</h4>
                                                </td>
                                                <td>
                                                    <h4>: {{ $user -> name }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4>email</h4>
                                                </td>
                                                <td>
                                                    <h4>: {{ $user -> email }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4>phone</h4>
                                                </td>
                                                <td>
                                                    <h4>: {{ $user -> phone }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4>address</h4>
                                                </td>
                                                <td>
                                                    <h4>: {{ $user -> address }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4>gender</h4>
                                                </td>
                                                <td>
                                                    <h4>: {{ $user -> gender }}</h4>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <h4>bank_account</h4>
                                                </td>
                                                <td>
                                                    <h4>: {{ $user -> bank_account }}</h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-profile" role="tabpanel">
                            @forelse ($portofolio as $porto)
                            <p>{{ $porto -> title }}</p>
                            @empty
                            <h4 class="text-center">Belum ada portofolio.</h4>
                            @endforelse
                        </div>
                        <div class="tab-pane fade" id="navs-pills-justified-messages" role="tabpanel">
                            @forelse ($result as $result)
                            <p>{{ $result -> project_id }}</p>
                            @empty
                            <h4 class="text-center">Belum ada project.</h4>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection