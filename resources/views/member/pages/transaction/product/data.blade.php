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
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Transaksi</h5>
                    <br>
                    <table id="zero-conf" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Produk</th>
                                <th>Status</th>
                                <th>Progress</th>
                                <th>Qty</th>
                                {{-- <th>Gambar</th> --}}
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->code}}</td>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->transaction_status}}</td>
                                    <td>{{$item->progress_status}}</td>
                                    <td>{{$item->qty}}</td>
                                    {{-- <td>{{$item->qty}}</td> --}}
                                    {{-- <td> --}}
                                        {{-- <a href="{{route('member.detail.transaction',$item->code)}}" class="btn btn-secondary">Detail</a>
                                        <a href="{{route('member.detail.transaction',$item->id)}}" class="btn btn-primary">Bayar</a> --}}
                                        {{-- <form action="{{ route('member.transaction',$item->id) }}" method="POST" style="display: inline-block;">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" value="Delete"
                                                onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data {{ $item->name }} ?')">
                                                 Batalkan
                                            </button>
                                        </form> --}}
                                    {{-- </td> --}}
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>




@endsection
@push('after-scripts')

@endpush

