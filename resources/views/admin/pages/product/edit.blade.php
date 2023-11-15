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
                    <form action="{{route('product.update',$product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Produk</label>
                            <input type="text" name="title" value="{{$product->title}}" class="form-control" id="title" aria-describedby="name" placeholder="Masukan nama produk">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <select name="category_id" id="type" class="form-control">
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}" {{$item->id == $product->category_id ? 'selected' : '' }} >{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Berat</label>
                                    <input type="number" name="weight" value="{{$product->weight}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan berat produk">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Qty</label>
                                    <input type="number" name="available_qty" value="{{$product->available_qty}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan qty produk">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga</label>
                                    <input type="number" name="price" value="{{$product->price}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan harga produk">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga Coret</label>
                                    <input type="number" name="price_coret" value="{{$product->price_coret}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan harga produk">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi Singkat</label>
                            <textarea id="summernote_short" name="short_description">{{$product->short_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi Produk</label>
                            <textarea id="summernote" name="description">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar</label>
                            <div class="input-images-1 pt-2">
                                {{-- @foreach ($product->productImages as $item)
                                        <img src=" {{$item->image}}" class="col-sm-5 mt-3">
                                @endforeach --}}
                            </div>
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
        let preloaded= {!!$product->productImages!!}
        console.log(preloaded);
        for (var i = 0; i < preloaded.length; i++) {
            var product = preloaded[i];
            var image = product.image;
            // Lakukan sesuatu dengan data produk, misalnya tampilkan di halaman
            // console.log(product);
        }
        $('.input-images-1').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'images',
            preloadedInputName: 'old',
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 250
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

