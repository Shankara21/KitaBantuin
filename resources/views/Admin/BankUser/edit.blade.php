@extends('layouts.main')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="m-3">
                <a href="{{ route('bank-user.index') }}" class="btn btn-primary">Kembali</a>
            </div>
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit <strong>{{ $bank -> name }}</strong></h5>
                <small class="text-muted float-end">Bank User Table</small>
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
                <form method="POST" action="{{ route('bank-user.update', $bank -> slug) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="name"
                                placeholder="Name" name="name" required value="{{ $bank -> name }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Slug</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="slug"
                                placeholder="Slug" name="slug" readonly value="{{ $bank -> slug }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="image"
                                placeholder="Image" name="image" onchange="previewImage()"/>
                                <img src="@if ($bank -> image == null)
                                {{ asset('img/payments/'.$bank -> slug.'.png') }}
                                @else
                                {{asset('storage/'.$bank->image)}}
                                @endif" class="img-preview mb-3 " alt="{{ $bank -> nama }}" width="200px" height="200px">
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
    fetch('/bank-user/checkSlug?name=' + name.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
  });
</script>
<script>
    function previewImage(){
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);
    oFReader.onload = function(oFREvent){
      imgPreview.src = oFREvent.target.result;
    }
  }
</script>
@endsection
@endsection
