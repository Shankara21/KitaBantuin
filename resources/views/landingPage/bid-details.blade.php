@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 mx-auto text-center">
        <div class="intro-wrap">
          <h1 class="mb-0">Detail Bid</h1>
          <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and
            Consonantia, there live the blind texts. </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="untree_co-section">
  <div class="container">
    <div class="card shadow" style="border-radius: 20px">
      <div class="card-body">
        <div class="d-flex justify-content-between">
          @if ($bid -> status == 'Pending')
          <p class="bg-warning
          p-2 " style="border-radius: 30px"><i class="fa-regular fa-clock"></i> {{ $bid -> status }}
          </p>
          @elseif ($bid -> status == 'Accepted')
          <p class="bg-success p-2 text-white" style="border-radius: 30px"><i class="fa-regular fa-circle-check"></i>
            {{ $bid -> status }}
          </p>
          @else
          <p class="bg-danger p-2 text-white" style="border-radius: 30px"><i class="fa-regular fa-circle-xmark"></i>
            {{ $bid -> status }}
          </p>
          @endif
          @if ($bid -> status == 'Accepted')
          <p class="bg-info
          p-2 " style="border-radius: 30px"><i class="fa-regular fa-clock"></i> Sisa pengerjaan project : {{ $day }}
            hari
          </p>
          @endif
        </div>
        <div class="row">
          <div class="col-sm-12">
            <div class="card shadow" style="border-radius: 20px;background:white">
              <div class="card-body">
                <h2>{{ $bid -> project -> title }}</h2>
                <p class="text-muted">
                  Deadline :
                  {{ $bid -> project -> deadline }}
                </p>
                <p class="text-muted">
                  Range budget :
                  {{ $bid -> project -> budget }}
                </p>
                <h6 class="text-muted">
                  Category :
                  {{ $bid -> project -> sub_categories }}
                </h6>
                <p>
                  {!! $bid -> project -> description !!}
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 my-3 @if ($project -> status == 'Done')
            d-none
          @endif">
            <div class="card shadow @if ($projectResult)
              d-none
            @endif " style="border-radius: 20px;background:white">
              <div class="card-body">
                @if ($bid -> status == 'Pending')
                <h6>{{ $bid -> user -> name }}</h6>
                <p class="text-muted">Nomial pengajuan : Rp.{{ number_format($bid -> price) }}</p>
                <p class="text-muted">Pengajuan : {{ $bid -> created_at -> diffForHumans() }}</p>

                @elseif ($project -> status == 'onProcess')
                <h2>Detail Pengerjaan</h2>
                <div class="col-sm-12">
                  <form action="{{ route('submitProject') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label class="text-black" for="fname">Bukti hasil pengerjaan</label>
                      <img class="img-preview mb-3 w-100" style="border-radius: 20px">
                      <input type="file" class="form-control" id="photo" placeholder="Photo" name="image" required
                        onchange="previewImage()" />
                    </div>
                    <div class="form-group">
                      <label class="text-black" for="fname">Link file</label>
                      <input type="text" class="form-control" id="fname" name="link" required>
                      <input type="hidden" name="project_id" value="{{ $bid -> project_id }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@include('sweetalert::alert')
@endsection

@section('script')
<script>
  function previewImage(){
                          const image = document.querySelector('#photo');
                          const imgPreview = document.querySelector('.img-preview');

                          imgPreview.style.width = '150px';

                          const oFReader = new FileReader();
                          oFReader.readAsDataURL(image.files[0]);

                          oFReader.onload = function(oFREvent){
                            imgPreview.src = oFREvent.target.result;
                          }
                        }

                        document.addEventListener('trix-file-accept', function(e){
                          e.preventDefault()
                        })
</script>
@endsection
