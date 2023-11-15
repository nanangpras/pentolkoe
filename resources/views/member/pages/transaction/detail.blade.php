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
                                        <td>{{$item->product->title}}</td>
                                        <td>@currency($item->product->price)</td>
                                        <td>{{$item->qty}}</td>
                                        <td>@currency($item->transaction_subtotal)</td>
                                    </tr>
                                    @php
                                        $sumtotal += $item->transaction_subtotal;
                                    @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3">Total</td>
                                    <td colspan="3">@currency($sumtotal)</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            @if ($detail->transaction_status == "SUCCESS")
                <button type="button" class="btn btn-success">Sudah Bayar</button>
                @if ($detail->transaction_status == "SUCCESS" && $detail->progress_status == "Selesai")
                    @if ($detail->notes)
                    <div class="card-body">
                        <p>{{$detail->notes}}</p>
                    </div>
                    @endif
                @endif
            @else
                <p>Silahkan lakukan pembayaran</p>
                <button type="button" id="pay-button" class="btn btn-success">Bayar</button>
            @endif
        </div>
    </div>
</div>
<form action="{{route('post.callback')}}" id="submit_form" method="POST">
    @csrf
    <input type="hidden" name="json" id="json_callback">
</form>




@endsection
@push('after-scripts')
{{-- <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"> --}}
<script src="https://app.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}">
</script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();
        snap.pay('{{ $detail->payment_token }}', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
                send_response_to_form(result);
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
                send_response_to_form(result);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                // document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result)
                send_response_to_form(result);
            }
        });
    });
    function send_response_to_form (result) {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
     }
</script>
@endpush

