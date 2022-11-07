@extends('layouts.landingPage.main')
@section('content')
<div class="hero hero-inner">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 mx-auto text-center">
                <div class="intro-wrap">
                    <h1 class="mb-0">Tambah Skill Worker</h1>
                    <p class="text-white">Far far away, behind the word mountains, far from the countries Vokalia and
                        Consonantia, there live the blind texts. </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    <div class="container">
        <div class="card my-5 shadow" style="border-radius: 20px">
            <div class="card-body">
                <h3>Upload Portofolio</h3>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade mt-3 show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                                <form action="/create-skill" method="POST" class="mb-5" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="Skill" class="form-label">Skill</label>
                                        <select class="js-example-basic-multiple select2-multiple" name="skill_id[]" multiple="multiple">
                                            @foreach ($skills as $skill)

                                            <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                            @endforeach
                                          </select>
                                      </div>

                                      <button type="submit" class="btn btn-primary">Tambah Skill</button>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        // Select2 Multiple
        $('.select2-multiple').select2({
            placeholder: "Select",
            allowClear: true
        });

    });

</script>
@endsection
