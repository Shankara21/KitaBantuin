@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="m-3">
                <a href="{{ route('bank.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Bank Detail</strong></h5>
                <small class="text-muted float-end">Bank Table</small>
            </div>
            <div class="mx-3">
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td colspan="2" class="text-center">
                                        @if ($bank -> image)
                                        <img src="{{ asset('storage/'.$bank -> image) }}" alt="" width="250px"width="250px" class="mb-5 img-thumbnail m-auto">
                                        @else
                                        <img src="{{ asset('landingPage/images/'.$bank -> slug.'.png') }}" alt="" width="250px"width="250px" class="mb-5 img-thumbnail m-auto">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Name</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $bank ->  name }}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Account Number</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $bank -> account_number}}</h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4>Account Name</h4>
                                    </td>
                                    <td>
                                        <h4>: {{ $bank -> account_name }}</h4>
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

@endsection