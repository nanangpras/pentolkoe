@extends('course.layouts.layout-course-member')
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
                        <h5 class="card-title">---</h5>
                        <p class="stats-text"><span class="badge badge-danger">Jumlah Transaksi</span></p>
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
                        <h5 class="card-title">--</h5>
                        <p class="stats-text"><span class="badge badge-success">Income (Rp)</span></p>
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
                        <h5 class="card-title">--</h5>
                        <p class="stats-text"><span class="badge badge-warning">Pending (Rp)</span></p>
                    </div>
                    <div class="stats-icon change-success">
                        <i class="material-icons">inventory_2</i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection

