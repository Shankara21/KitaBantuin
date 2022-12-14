@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card h-100">
        <h5 class="card-header">List of Pengajuan</h5>
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
                        <th>Name</th>
                        <th>About</th>
                        {{-- <th>CV</th>
                        <th>KTP</th> --}}
                        <th>Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($pengajuan as $item)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>{{ $item -> user ->  name }}</td>
                        <td>{{ $item -> about }}</td>
                        {{-- <td><img src="{{ asset('storage/'.$item -> cv) }}" alt="" width="100px"></td>
                        <td><img src="{{ asset('storage/'.$item -> ktp) }}" alt="" width="100px"></td> --}}
                        <td><span class="badge rounded-pill bg-warning text-black">{{ $item -> status }}</span></td>
                        <td class="text-center">

                            <form class="d-inline" action="{{ route('worker-details.update', $item -> id) }}"
                                method="POST">
                                @method('PUT')
                                @csrf
                                <button class="btn btn-success p-1 text-white font-bold">
                                    <i class="bx bx-check-circle me-1"></i>
                                    Accept
                                </button>
                            </form>
                            <a class="btn btn-info p-1 text-white font-bold p-1"
                                href="{{ route('worker-details.show', $item -> id) }}">
                                <i class="bx bx-info-circle me-1"></i>
                                Details
                            </a>
                            <form action="/worker-details/{{ $item -> id }}" method="POST"
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
            {{ $pengajuan -> links() }}
        </div>
    </div>
</div>
@endsection