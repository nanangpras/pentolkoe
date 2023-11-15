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
                    <h5 class="card-title">Input Produk</h5>
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="name" placeholder="Masukan nama produk">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kategori</label>
                                    <select name="category_id" id="type" class="form-control">
                                        @foreach ($category as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Sub Kategori</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                                        <option>Pilih Sub</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Berat</label>
                                    <input type="number" name="weight" class="form-control" id="name" aria-describedby="name" placeholder="Masukan berat produk">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Qty</label>
                                    <input type="number" name="available_qty" class="form-control" id="name" aria-describedby="name" placeholder="Masukan qty produk">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga</label>
                                    <input type="number" name="price" class="form-control" id="name" aria-describedby="name" placeholder="Masukan harga produk">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga Coret</label>
                                    <input type="number" name="price_coret" class="form-control" id="name" aria-describedby="name" placeholder="Masukan harga coret">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Link</label>
                                    <input type="text" name="link" class="form-control" id="link" aria-describedby="name" placeholder="Masukan Link Preview">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Attachment</label>
                                    <input type="file" name="attachment" id="attachment" class="form-control" accept="application/zip">
                                    {{-- <input type="text" name="attachment" class="form-control" id="link" aria-describedby="name" placeholder="Masukan Link Preview"> --}}
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Attachment Link</label>
                                    <input type="text" name="attachment_link" class="form-control" id="link" aria-describedby="name" placeholder="Masukan attachment Link">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi Singkat</label>
                            <textarea id="summernote_short" name="short_description"></textarea>
                            {{-- <textarea name="description" class="form-control" id="description" cols="30" rows="10">Deskripsi Produk</textarea> --}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi Produk</label>
                            <textarea id="summernote" name="description"></textarea>
                            {{-- <textarea name="description" class="form-control" id="description" cols="30" rows="10">Deskripsi Produk</textarea> --}}
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar</label>
                            <div class="input-images-1 pt-2"></div>
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
                if (category_id) {
                    jQuery.ajax({
                        url:"/subcategory/product/"+category_id,
                        type:'GET',
                        dataType:'json',
                        success:function(data){
                            // console.log(data);
                            $('select[name="subcategory_id"]').empty();
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

