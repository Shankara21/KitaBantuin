@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card h-100">
        <h5 class="card-header">List of banks</h5>
        @if (count($errors) > 0)
        <div class="mx-3 alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="table-responsive text-nowrap h-100">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Nomor Rekening</th>
                        {{-- <th>KTP</th>
                        <th>Status</th> --}}
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($banks as $item)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>
                            @if ($item -> image)
                                <img src="{{ asset('storage/'.$item -> image) }}" alt="" width="150px">
                            @else
                                <img src="{{ asset('landingPage/images/'.$item -> slug.'.png') }}" alt="" width="150px">
                            @endif
                        </td>
                        <td>{{ $item -> name }}</td>
                        <td>{{ $item -> account_number }}</td>
                        <td class="text-center">
                            <a class="btn btn-info p-1 text-white font-bold p-1"
                                href="{{ route('bank.show', $item -> id) }}">
                                <i class="bx bx-info-circle me-1"></i>
                                Details
                            </a>
                            <form action="{{ route('bank.destroy', $item -> id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger p-1 text-white font-bold p-1"><i
                                        class="bx bx-trash me-1"></i>
                                    Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end m-3">
            {{ $banks -> links() }}
        </div>
    </div>
</div>
@endsection