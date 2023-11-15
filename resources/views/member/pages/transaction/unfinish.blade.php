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
    <h6>Segera selesaikan pembayaran transaksi Anda <strong>{{$order->code}}</strong></h6>
    <a href="{{route('member.mytransaction',Auth::user()->id)}}" class="btn btn-primary">Kembali</a>
    <button type="button" id="pay-button" class="btn btn-success">Bayar</button>
    <form action="{{route('post.callback')}}" id="submit_form" method="POST">
        @csrf
        <input type="hidden" name="json" id="json_callback">
    </form>
</div>




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

