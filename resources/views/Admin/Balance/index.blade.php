@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card h-100">
        <h5 class="card-header">Data Pemasukan Dan Pengeluaran</h5>
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
                        <th>Total</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($balances as $item)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $item -> total_profit }}</td>
                        @if ($item->status == 'Pemasukan')
                        <td><span class="badge rounded-pill bg-success text-black">{{ $item -> status }}</span></td>
                        @else
                        <td><span class="badge rounded-pill bg-danger text-black">{{ $item -> status }}</span></td>
                        @endif

                        <td>{{ $item -> created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                            <form action="{{ route('balance.destroy', $item -> id) }}" method="POST" class="d-inline">
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
            {{ $balances -> links() }}
        </div>
    </div>
</div>
@endsection
