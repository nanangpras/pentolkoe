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
    <h6>Detail Transaksi</h6>

    <div class="profile-content">
        <div class="col-lg-8">
            <div class="card card-transactions">
                <div class="card-body">
                    <h5 class="card-title">Detail Transaksi<a href="#" class="card-title-helper blockui-transactions"><i class="material-icons">refresh</i></a></h5>
                    
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

