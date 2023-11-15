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
                    <h5 class="card-title">Input Kategori</h5>
                    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama kategori</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Sub kategori</label>
                            <input type="text" name="namesubcategory" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tipe kategori</label>
                            <select name="type" id="type" class="form-control">
                                <option value="artikel">Artikel</option>
                                <option value="produk">Produk</option>
                                <option value="edukasi">Edukasi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Gambar kategori</label>
                            <input type="file" name="image" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

