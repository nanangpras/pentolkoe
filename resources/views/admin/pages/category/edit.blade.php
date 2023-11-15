@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data Kategori</a></li>
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
                    <h5 class="card-title">Update Kategori</h5>
                    <form action="{{route('category.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama kategori</label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipe kategori</label>
                            <select name="type" id="type" class="form-control">
                                <option value="artikel">Artikel</option>
                                <option value="produk">Produk</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar kategori</label>
                            <input type="hidden" value="{{ $category->image }}" name="oldImage">
                            <div class="input-group mb-3">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" id="imagecategory" name="image" onchange="previewImage()">
                                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div>
                            @if ($category->image)
                                <img src="{{ $category->image }}" class="img-preview img-fluid col-sm-5 mt-3">
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
        const image     = document.querySelector('#imagecategory');
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

