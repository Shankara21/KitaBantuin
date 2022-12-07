@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="m-3">
                <a href="{{ route('result.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Project Result Detail</strong></h5>
                <small class="text-muted float-end">Project Result Table</small>
            </div>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td colspan="2" class="text-center">
                                    <img src="{{ asset('storage/'. $result->image) }}" width="500" height="300" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Name Project</h4>
                                </td>
                                <td>
                                    <h4>: {{ $result -> project -> title}}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Name</h4>
                                </td>
                                <td>
                                    <h4>: {{ $result -> worker -> name }}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Link</h4>
                                </td>
                                <td>
                                    <h4>: {{ $result -> link }}</h4>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h4>Tanggal</h4>
                                </td>
                                <td>
                                    <h4>: {{ $result -> created_at -> format('d/m/Y') }}</h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mb-4">
                        <a href="{{ route('admin-payment.edit', $result->id) }}" class="btn btn-warning">
                            <i class="fa-solid fa-credit-card"></i>
                            Bayar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
