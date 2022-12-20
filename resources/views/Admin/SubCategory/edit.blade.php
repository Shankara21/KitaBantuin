@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="m-3">
                <a href="{{ route('subCategories.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Create new Category</strong></h5>
                <small class="text-muted float-end">Sub Categories Table</small>
            </div>
            @if (count($errors) > 0)
            <div class="mx-3 alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-body">
                <form method="POST" action="{{ route('subCategories.update', $subCategory -> slug) }}">
                    @method('PUT')
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name"
                                placeholder="Name" name="name" required
                                value="{{ $subCategory -> name }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slug"
                                placeholder="Slug" name="slug" readonly
                                value="{{ $subCategory -> slug }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Category</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="exampleFormControlSelect1"
                                aria-label="Default select example" required name="category_id">
                                @foreach ($categories as $item)
                                <option value="{{ $item -> id }}"
                                    {{ $subCategory->category_id == $item->id ? 'selected' : '' }}>{{ $item -> name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('script')
<script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');

  name.addEventListener('change', function(){
    fetch('/subCategories/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
</script>
@endsection
@endsection
