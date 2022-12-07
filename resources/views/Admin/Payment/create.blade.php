@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="m-3">
                <a href="{{ route('user.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Bayar Worker</strong></h5>
                <small class="text-muted float-end">Bayar Worker</small>
            </div>
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <form action="{{ route('admin-payment.update', $result->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                    <table class="table table-borderless">
                        <tbody>

                                <input type="hidden" name="project_id" value="{{ $result->project_id }}">
                                <input type="hidden" name="bank_id" value="{{ $result->project->user->bankuser_id }}">
                                <tr>
                                    <td>
                                        <h4>Name Worker</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $result -> worker -> name}}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Bank</h4>
                                    </td>
                                    <td>
                                        <h4>: <img src="{{ asset('img/payments/'.$result -> project -> worker -> bankUser -> slug.'.png' ) }}" width="200" height="200"></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Nomor Rekening</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $result -> project -> worker -> bank_account }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Total Bayar</h4>
                                    </td>
                                    <td>
                                        <input type="number" class="form-control" name="amount" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Bukti Transfer</h4>
                                    </td>
                                    <td>
                                        <input type="file" class="form-control" name="bukti_transfer" />
                                    </td>
                                </tr>

                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mb-4">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa-solid fa-credit-card"></i>
                            Bayar
                        </button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
