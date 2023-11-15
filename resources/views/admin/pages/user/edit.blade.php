@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data User</a></li>
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
                    <h5 class="card-title">Input User</h5>
                    <form action="{{route('user.update',$editUser->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama User</label>
                                    <input type="text" name="name" value="{{$editUser->name}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email User</label>
                                    <input type="email" name="email" value="{{$editUser->email}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="email" name="email" value="{{$editUser->phone}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Provinsi</label>
                                    <input type="email" name="email" value="{{$editUser->province_id}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kota/Kabutan</label>
                                    <input type="email" name="email" value="{{$editUser->city_id}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kecamatan</label>
                                    <input type="email" name="email" value="{{$editUser->subdistrict_id}}" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kodepos</label>
                                    <input type="text" value="{{$editUser->postcode}}" name="postcode" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alamat</label>
                                    <textarea name="address" class="form-control" id="address" cols="30" rows="10">{{$editUser->address}}</textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

