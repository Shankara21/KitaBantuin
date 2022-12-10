@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card h-100">
        <h5 class="card-header">List of Bank User</h5>
        @if (count($errors) > 0)
        <div class="mx-3 alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="mx-3 mb-3">
            <a href="{{ route('bank-user.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus" style="padding-right: 10px"></i>
                Add New Bank User</a>
        </div>
        <div class="table-responsive text-nowrap h-100">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($banks as $item)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>
                            @if (File::exists(public_path('storage/'.$item -> image)))
                                <img src="{{ asset('storage/'.$item -> image) }}" alt="" width="150px">
                            @elseif($item->image)
                                <img src="{{ asset($item->image) }}" alt="" width="150px">
                            @endif
                        </td>
                        <td>{{ $item -> name }}</td>
                        <td class="text-center">
                            <a class="btn btn-warning p-1 text-white font-bold p-1"
                                href="{{ route('bank-user.edit', $item -> slug) }}">
                                <i class="bx bx-edit-alt me-1"></i>
                                Edit
                            </a>
                            <form action="{{ route('bank-user.destroy', $item -> slug) }}" method="POST"
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
