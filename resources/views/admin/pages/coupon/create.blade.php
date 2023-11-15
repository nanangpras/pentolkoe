@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Data Kupon</a></li>
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
                    <h5 class="card-title">Input Kupon</h5>
                    <form action="{{route('coupon.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Code</label>
                                    <input type="text" name="code" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Deskripsi</label>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
                            {{-- <input type="text" name="code" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori"> --}}
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nilai</label>
                                    <input type="text" name="discount_rate" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tipe</label>
                                    <select name="type" id="type" class="form-control">
                                        <option value="percentage">Persen (%)</option>
                                        <option value="numeric">Potongan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Mulai</label>
                                    <input type="date" name="start_date" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Selesai</label>
                                    <input type="date" name="end_date" class="form-control" id="name" aria-describedby="name" placeholder="Masukan nama kategori">
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

