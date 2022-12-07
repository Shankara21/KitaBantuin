@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card h-100">
        <h5 class="card-header">Data Pembayaran</h5>
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
                        <th>Name User</th>
                        <th>Bank</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Jenis</th>
                        <th>Tanggal</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($payments as $item)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $item -> user ->  name }}</td>
                        <td>{{ $item -> bank -> name }}</td>
                        <td>{{ $item -> amount }}</td>
                        <td>
                            @if ($item -> status == 'Pending')
                            <span class="badge rounded-pill bg-warning text-black">{{ $item -> status }}</span>
                            @elseif ($item -> status == 'Accepted')
                            <span class="badge rounded-pill bg-success text-black">{{ $item -> status }}</span>
                            @elseif ($item -> status == 'Rejected')
                            <span class="badge rounded-pill bg-danger text-black">{{ $item -> status }}</span>
                            @endif
                        </td>
                        <td>{{ $item -> jenis }}</td>
                        <td>{{ $item -> created_at->format('d/m/Y') }}</td>

                        <td class="text-center">
                            @if ($item -> status == 'Pending')
                                <form class="d-inline" action="{{ route('payment.update', $item -> id) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-success p-1 text-white font-bold">
                                    <i class="bx bx-check-circle me-1"></i>
                                    Accept
                                </button>
                            </form>
                            <a class="btn btn-info p-1 text-white font-bold p-1"
                                href="{{ route('payment.show', $item -> id) }}">
                                <i class="bx bx-info-circle me-1"></i>
                                Details
                            </a>
                            <form action="{{ route('payment.destroy', $item -> id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger p-1 text-white font-bold p-1"><i
                                        class="bx bx-trash me-1"></i>
                                    Delete</button>
                            </form>
                            @elseif ($item -> status == 'Accepted')
                            <a class="btn btn-info p-1 text-white font-bold p-1"
                                href="{{ route('payment.show', $item -> id) }}">
                                <i class="bx bx-info-circle me-1"></i>
                                Details
                            </a>
                            <form action="{{ route('payment.destroy', $item -> id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger p-1 text-white font-bold p-1"><i
                                        class="bx bx-trash me-1"></i>
                                    Delete</button>
                            </form>
                            @elseif ($item -> status == 'Rejected')
                            <a class="btn btn-info p-1 text-white font-bold p-1"
                                href="{{ route('payment.show', $item -> id) }}">
                                <i class="bx bx-info-circle me-1"></i>
                                Details
                            </a>
                            <form action="{{ route('payment.destroy', $item -> id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger p-1 text-white font-bold p-1"><i
                                        class="bx bx-trash me-1"></i>
                                    Delete</button>
                            </form>
                            @endif

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end m-3">
            {{ $payments -> links() }}
        </div>
    </div>
</div>
@endsection
