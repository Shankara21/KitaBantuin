@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">List of Categories</h5>
        <div class="mx-3 mb-3">
            <a href="{{ route('categories.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus" style="padding-right: 10px"></i>
                Add new Category</a>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($categories as $item)
                    <tr>
                        <td style="width: 10%">{{ $loop -> iteration }}</td>
                        <td style="width: 70%" class="mx-auto">{{ $item -> name }}</td>
                        <td style="width: 20%">
                            <a class="btn btn-warning p-1 text-white"
                                href="{{ route('categories.edit', $item -> slug) }}">
                                <i class="bx bx-edit-alt me-1"></i>
                                Edit
                            </a>
                            <form action="{{ route('categories.destroy', $item -> slug) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger p-1 text-white"><i
                                        class="bx bx-trash me-1"></i>
                                    Delete</button>
                            </form>
                            {{-- <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                </div>
                            </div> --}}
                        </td>
                    </tr>
                    @empty

                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection