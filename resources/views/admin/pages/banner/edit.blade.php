@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data Banner</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form</li>
        </ol>
    </nav>
</div>
<div class="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <p class="page-desc">Input data dengan benar</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Input Banner</h5>
                    <form action="{{route('banner.update',$editBanner->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" name="name" value="{{$editBanner->name}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama banner">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <input type="text" name="description" value="{{$editBanner->description}}" class="form-control" id="description" aria-describedby="name" placeholder="Masukan deskripsi banner">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link</label>
                                    <input type="text" name="link" value="{{$editBanner->link}}" class="form-control" id="description" aria-describedby="name" placeholder="Masukan link banner apabila ada">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios1" value="1" {{ $editBanner->status == 1 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleRadios1">
                                          Aktif
                                        </label>
                                      </div>
                                      <div class="form-check">
                                        <input class="form-check-input" type="radio" name="status" id="exampleRadios2" value="0" {{ $editBanner->status == 0 ? 'checked' : '' }}>
                                        <label class="form-check-label" for="exampleRadios2">
                                          Nonaktif
                                        </label>
                                      </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar kategori</label>
                            <input type="hidden" value="{{ $editBanner->banner_image }}" name="oldImage">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="imagebanner" name="image" onchange="previewImage()">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            @if ($editBanner->banner_image)
                                <img src="{{ $editBanner->banner_image }}" class="img-preview img-fluid col-sm-5 mt-3">
                            @else
                                <img class="img-preview img-fluid col-sm-5 mt-3">
                            @endif
                            {{-- <input type="file" name="image" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori"> --}}
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('after-scripts')
<script>
    function previewImage() {
        const image     = document.querySelector('#imagebanner');
        const imgprev   = document.querySelector('.img-preview');
        imgprev.style.display = 'block';

        const ofReader = new FileReader();
        ofReader.readAsDataURL(image.files[0]);

        ofReader.onload = function(oFREvent){
            imgprev.src = oFREvent.target.result;
        }
     }

</script>
@endpush

