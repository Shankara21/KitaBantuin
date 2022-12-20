@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="m-3">
                <a href="{{ route('admin.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Admin Detail</strong></h5>
                <small class="text-muted float-end">user Table</small>
            </div>
            <div class="mx-3">
                <div class="nav-align-top mb-4">
                    <ul class="nav nav-pills mb-3 nav-fill" role="tablist">
                        <li class="nav-item">
                            <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                data-bs-target="#navs-pills-justified-home" aria-controls="navs-pills-justified-home"
                                aria-selected="true">
                                <i class="tf-icons bx bx-home"></i> Details
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
                                                    @if ($user->photo)
                                                    <img src="{{ asset('storage/'. $user -> photo) }}" alt=""
                                                        width="150px" class="mb-5 img-thumbnail rounded m-auto">
                                                    @elseif (!$user -> photo && $user -> gender == 'Laki-Laki')
                                                    <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt=""
                                                        width="150px" class="mb-5 img-thumbnail rounded m-auto">
                                                    @elseif (!$user -> photo && $user -> gender == 'Perempuan')
                                                    <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt=""
                                                        width="150px" class="mb-5 img-thumbnail rounded m-auto">
                                                    @else
                                                    <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt=""
                                                        width="150px" class="mb-5 img-thumbnail rounded m-auto">
                                                    @endif
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection