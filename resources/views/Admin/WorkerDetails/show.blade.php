@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="m-3">
                <a href="{{ route('worker-details.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Admin Detail</strong></h5>
                <small class="text-muted float-end">Pengajuan Table</small>
            </div>
            <div class="mx-3">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        @if ($pengajuan -> user->photo)
                                        <img src="{{ asset('storage/'. $pengajuan -> user -> photo) }}" alt=""
                                            width="150px" class="mb-5 img-thumbnail rounded m-auto">
                                        @elseif (!$pengajuan -> user -> photo && $pengajuan -> user -> gender ==
                                        'Laki-Laki')
                                        <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt="" width="150px"
                                            class="mb-5 img-thumbnail rounded m-auto">
                                        @elseif (!$pengajuan -> user -> photo && $pengajuan -> user -> gender ==
                                        'Perempuan')
                                        <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt="" width="150px"
                                            class="mb-5 img-thumbnail rounded m-auto">
                                        @else
                                        <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt="" width="150px"
                                            class="mb-5 img-thumbnail rounded m-auto">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Name</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $pengajuan -> user -> name }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>email</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $pengajuan -> user -> email }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>phone</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $pengajuan -> user -> phone }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>address</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $pengajuan -> user -> address }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>gender</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $pengajuan -> user -> gender }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>bank_account</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $pengajuan -> user -> bank_account }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Status</h4>
                                    </td>
                                    <td>
                                        <h4>: <span
                                                class="badge rounded-pill bg-warning text-black">{{ $pengajuan -> status }}</span>
                                        </h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>cv</h4>
                                    </td>
                                    <td>
                                        <h4>: <img src="{{ asset('storage/'.$pengajuan -> cv) }}" alt=""
                                                style="max-height: 250px; border-radius: 20px">
                                        </h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>ktp</h4>
                                    </td>
                                    <td>
                                        <h4>: <img src="{{ asset('storage/'.$pengajuan -> ktp) }}" alt=""
                                                style="max-height: 250px; border-radius: 20px"></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>About</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $pengajuan -> about }}</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <form class="d-inline my-5" action="{{ route('worker-details.update', $pengajuan -> id) }}"
                        method="POST">
                        @method('PUT')
                        @csrf
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-success text-white font-bold w-25 ">
                                <i class="bx bx-check-circle display-6" style="transform: translateY(-2px)"></i>
                                <h4 class="d-inline text-white">Accept</h4>
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection