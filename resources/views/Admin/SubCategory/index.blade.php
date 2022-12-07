@extends('layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <h5 class="card-header">List of Sub Categories</h5>
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
            <a href="{{ route('subCategories.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus" style="padding-right: 10px"></i>
                Add new SubCategory</a>
        </div>
        <div class="table-responsive text-nowrap p-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($subCategories as $item)
                    <tr>
                        <td style="width: 10%">{{ $loop -> iteration }}</td>
                        <td style="width: 35%" class="mx-auto">{{ $item -> name }}</td>
                        <td style="width: 35%" class="mx-auto">{{ $item -> category -> name }}</td>
                        <td style="width: 20%">
                            <a class="btn btn-warning p-1 text-white"
                                href="{{ route('subCategories.edit', $item -> slug) }}">
                                <i class="bx bx-edit-alt me-1"></i>
                                Edit
                            </a>
                            <form action="{{ route('subCategories.destroy', $item -> slug) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger p-1 text-white item-{{ $item -> id }}"><i
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
        <div class="d-flex justify-content-end m-3">
            {{ $subCategories -> links() }}
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
