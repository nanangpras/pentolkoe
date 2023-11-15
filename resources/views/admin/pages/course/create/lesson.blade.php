@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data Produk</a></li>
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
                    <h5 class="card-title">Input Pelajaran</h5>
                    <form action="{{route('course.input.lesson')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chapter ID</label>
                            <input type="text" name="chapter_id" value="{{$chapter->id ?? ''}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan harga produk">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul Pelajaran</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Masukan harga produk">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Video Pelajaran</label>
                            <input type="text" name="video" class="form-control" id="name" aria-describedby="name" placeholder="Masukan harga produk">
                        </div>
                        <button type="submit" class="btn btn-primary">Next</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('imageuploader/imageuploader.css') }}">
@endpush
@push('after-scripts')
    <script src="{{ asset('imageuploader/imageuploader.js') }}"></script>
    <script>
        $('.input-images-1').imageUploader();
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 250
            });

            $('select[name="category_id"]').on('change',function () {
                let category_id = $(this).val();
                let type        = $(this).attr('data-type');
                if (category_id && type) {
                    jQuery.ajax({
                        url:'/subcategory/list/' + type + '/' + category_id,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            console.log(data);
                            // $('select[name="subcategory_id"]').append('<option selected="true" disabled="disabled"> Pilih Sub </option>');
                            $.each(data,function (key,value) {
                                $('select[name="subcategory_id"]').append('<option value="'+ value.id +'"> ' + value.name + '</option>');
                            })
                        }
                    })
                }else{
                    $('select[name="subcategory_id"]').empty();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote_short').summernote({
                height: 250
            });
        });
    </script>
@endpush

