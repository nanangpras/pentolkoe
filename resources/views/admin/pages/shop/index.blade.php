@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Apps</a></li>
            <li class="breadcrumb-item active" aria-current="page">File Manager</li>
        </ol>
    </nav>
    <div class="page-options">
        <a href="#" class="btn btn-danger">Go Premium</a>
    </div>
</div>
<div class="main-wrapper">
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-transparent">
                <div class="card-body">
                    <a href="#" class="btn btn-primary btn-block">Upload File</a>
                    <div class="file-manager-menu">
                        <ul class="list-unstyled">
                            <li class="fmm-title">Kategori</li>
                            @foreach ($category as $item)
                                <li>
                                    <a href="#"><i class="bg-danger"></i>{{$item->name}}</a>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="storage-info">
                        <span class="storage-info-title">Storage</span>
                        <span class="storage-info-text">125.4GB used of 500GB</span>
                        <div class="progress m-b-sm">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="card card-transparent file-list recent-files">
                <div class="card-body">
                    <h5 class="card-title">Produk</h5>
                    <div class="row">
                        @foreach ($product as $item)
                            <div class="col-lg-6 col-xl-3 mt-4">
                                <div class="card file photo">
                                    <div class="file-options dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="#">View Details</a>
                                            <a class="dropdown-item" href="#">Add to Cart</a>
                                        </div>
                                    </div>
                                    <div class="card-header file-icon"><img src="{{$item->productImages->count() ? $item->productImages->first()->image : ''}}" alt="" width="100" height="100">
                                        {{-- <i class="material-icons">photo</i> --}}
                                    </div>
                                    <div class="card-body file-info">
                                        <p>{{$item->title}}</p>
                                        <span class="file-size">Rp {{$item->price}}</span><br>
                                        <span class="file-date mt-3">
                                            <a href="#">
                                                <i class="material-icons">add_shopping_cart</i>
                                            </a>
                                            <a href="#">
                                                <i class="material-icons">visibility</i>
                                            </a>
                                        </span>


                                        {{-- {{$item->productImages->count() ? $item->productImages->first()->image : ''}} --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('after-scripts')

@endpush

