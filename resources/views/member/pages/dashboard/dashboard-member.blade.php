@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Apps</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    {{-- <div class="page-options">
        <a href="#" class="btn btn-secondary">Settings</a>
        <a href="#" class="btn btn-primary">Upgrade</a>
    </div> --}}
</div>
<div class="main-wrapper">
    <div class="row stats-row">
        <div class="col-lg-4 col-md-12">
            <div class="card card-transparent stats-card">
                <div class="card-body">
                    <div class="stats-info">
                        <h5 class="card-title">{{$cancel ?? '0'}}</h5>
                        <p class="stats-text"><span class="badge badge-danger">Gagal (Jumlah)</span></p>
                    </div>
                    <div class="stats-icon change-danger">
                        <i class="material-icons">account_balance_wallet</i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card card-transparent stats-card">
                <div class="card-body">
                    <div class="stats-info">
                        <h5 class="card-title">@currency($success ?? '0')</h5>
                        <p class="stats-text"><span class="badge badge-success">Selesai (Rp)</span></p>
                    </div>
                    <div class="stats-icon change-success">
                        <i class="material-icons">paid</i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-12">
            <div class="card card-transparent stats-card">
                <div class="card-body">
                    <div class="stats-info">
                        <h5 class="card-title">@currency($pending ?? '0')</h5>
                        <p class="stats-text"><span class="badge badge-warning">Pending (Rp)</span></p>
                    </div>
                    <div class="stats-icon change-success">
                        <i class="material-icons">inventory_2</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="card savings-card">
                <div class="card-body">
                    <h5 class="card-title">Popular Products<span class="card-title-helper">Today</span></h5>
                    <div class="top-products-list">
                        @foreach ($popularProduct as $item)
                            <div class="product-item mb-4">
                                <img src="{{$item->productImages->first()->image ?? ''}}" width="60" height="80" alt="">
                                <h5>{{$item->title}}</h5>
                                <span>{{$item->transaction_details_count}} transaksi</span>
                                {{-- <i class="material-icons product-item-status product-item-success">arrow_upward</i> --}}
                                {{-- <i class="material-icons product-item-status product-item-danger">arrow_downward</i> --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

