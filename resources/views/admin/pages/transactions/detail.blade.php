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


    <div class="profile-content">

        <div class="col-lg-8">
            <div class="mb-4">
                <h6>Detail Transaksi <strong>{{$detail->code}}</strong></h6>
                <h6>Status <strong>{{$detail->transaction_status}}</strong></h6>
            </div>
            <div class="card card-transactions">
                <div class="card-body">
                    <h5 class="card-title">Contact Info</h5>
                    <ul class="list-unstyled profile-about-list">
                        <li><i class="material-icons">person</i><span>{{$detail->user->name}}</span></li>
                        <li><i class="material-icons">mail_outline</i><span>{{$detail->user->email}}</span></li>
                        <li><i class="material-icons">home</i><span>Alamat {{$detail->user->address}}</span></li>
                        <li><i class="material-icons">local_phone</i><span>{{$detail->user->phone}}</span></li>
                    </ul>
                </div>
            </div>
            <div class="card card-transactions">
                <div class="card-body">
                    <h5 class="card-title">Detail Transaksi<a href="#" class="card-title-helper blockui-transactions"><i class="material-icons">refresh</i></a></h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td>Produk</td>
                                    <td>Harga</td>
                                    <td>Qty</td>
                                    <td>Total</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sumtotal = 0;
                                @endphp
                                @foreach ($detail->details as $item)
                                    <tr>
                                        <td>{{$item->product->title}}
                                            <br>
                                            @if ($item->product->attachment || $item->product->attachment_link)
                                                <a href="{{$item->product->attachment_link}}" target="_blank" class="btn btn-sm btn-outline-warning" >link</a>
                                                <a href="{{asset($item->product->attachment)}}" class="btn btn-sm btn-outline-success" >berkas</a>
                                            @endif
                                        </td>
                                        <td>@currency($item->product->price)</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->transaction_subtotal}}</td>
                                    </tr>
                                    @php
                                        $sumtotal += $item->transaction_subtotal;
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
            <a href="{{route('transaction.list')}}" type="button" id="pay-button" class="btn btn-success">Kembali</a>
        </div>
    </div>
</div>
@endsection


