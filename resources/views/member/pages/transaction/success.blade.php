@extends('admin.layouts.layout-dashboard')
@section('content')


<!-- Page-header end -->

<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Extended</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Tables</li>
        </ol>
    </nav>
</div>
@if (session('success'))
<div class="alert alert-primary outline-alert" role="alert">
    {{ session('success') }}
    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button> --}}
</div>
@endif
<div class="main-wrapper">
    <h6>Sukses melakukan Transaksi <strong>{{$order->code}}</strong></h6>
    <a href="{{route('member.mytransaction',Auth::user()->id)}}" class="btn btn-primary">Kembali</a>
</div>




@endsection
@push('after-scripts')

@endpush

