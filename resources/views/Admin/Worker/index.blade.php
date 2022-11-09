@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card h-100">
        <h5 class="card-header">List of Workers</h5>
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
            <a href="{{ route('workers.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus" style="padding-right: 10px"></i>
                Add new Worker</a>
        </div>
        <div class="table-responsive text-nowrap h-100">
            <table class="table table-hover text-center">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($users as $item)
                    <tr>
                        <td>{{ $loop -> iteration }}</td>
                        <td>
                            @if ($item->photo)
                            <img src="{{ asset('storage/'. $item -> photo) }}" alt="" height="100px">
                            @elseif (!$item -> photo && $item -> gender == 'Laki-Laki')
                            <img src="{{ asset('assets/img/icons/avatar/man.png') }}" alt="" height="100px">
                            @elseif (!$item -> photo && $item -> gender == 'Perempuan')
                            <img src="{{ asset('assets/img/icons/avatar/woman.png') }}" alt="" height="100px">
                            @else
                            <img src="{{ asset('assets/img/icons/avatar/user.png') }}" alt="" height="100px">
                            @endif
                        </td>
                        <td>{{ $item -> name }}</td>
                        <td>{{ $item -> email ?? '-' }}</td>
                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('workers.show', $item -> id) }}">
                                        <i class="bx bx-show me-1"></i>
                                        Details
                                    </a>
                                    <a class="dropdown-item" href="{{ route('workers.edit', $item -> id) }}">
                                        <i class="bx bx-edit-alt me-1"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('workers.destroy', $item -> id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i>
                                            Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">
                            <h4 class="m-4">Tidak ada data worker.</h4>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end m-3">
            {{ $users -> links() }}
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
