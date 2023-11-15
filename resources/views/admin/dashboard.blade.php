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
                        <h5 class="card-title">{{$count_transaction}}</h5>
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
                        <h5 class="card-title">@currency($income)</h5>
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
                        <h5 class="card-title">@currency($pending)</h5>
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
        <div class="col-lg-8">
            <div class="card card-transactions">
                <div class="card-body">
                    <h5 class="card-title">Transaksi<a href="#" class="card-title-helper blockui-transactions"><i class="material-icons">refresh</i></a></h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Code</td>
                                    <td>Status</td>
                                    <td>User</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sumtotal = 0;
                                @endphp
                                @foreach ($lastFive as $item)
                                    <tr>
                                        <td>{{$item->code}}</td>
                                        <td>
                                            @if ($item->transaction_status == 'PENDING')
                                                <span class="badge badge-warning">{{$item->transaction_status}}</span>
                                            @elseif($item->transaction_status == 'SUCCESS')
                                                <span class="badge badge-success">{{$item->transaction_status}}</span>
                                            @endif
                                        </td>
                                        <td>{{$item->user->name}}</td>
                                        <td>Rp {{$item->transaction_total}}</td>
                                    </tr>
                                    @php
                                        $sumtotal += $item->transaction_total;
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td colspan="3">Rp {{$sumtotal}}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card top-products">
                <div class="card-body">
                    <h5 class="card-title">Popular Products<span class="card-title-helper">Today</span></h5>
                    <div class="top-products-list">
                        @foreach ($popularProduct as $item)
                            <div class="product-item">
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

