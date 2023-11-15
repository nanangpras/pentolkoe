<?php

namespace App\Http\Controllers\Home;

use App\Helpers\SendWa;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Service\ProductService;
use App\Service\RajaOngkirService;
use App\Service\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    protected $rajaOngkirService;
    protected $transactionService;
    protected $productService;

    public function __construct(
        RajaOngkirService $rajaOngkirService,
        TransactionService $transactionService,
        ProductService $productService)
    {
        $this->rajaOngkirService    = $rajaOngkirService;
        $this->transactionService   = $transactionService;
        $this->productService       = $productService;
    }

    private function getCarts()
    {
        $cart = json_decode(request()->cookie('konveksi-carts'), true);
        $cart = $cart != '' ? $cart:[];
        return $cart;
    }

    public function index()
    {
        if (Auth::check()) {
            $cart = $this->getCarts();
            $subtotal = collect($cart)->sum(function($q){
                return $q['qty'] * $q['price'];
            });
            $weight_total = collect($cart)->sum(function($q){
                return $q['qty'] * $q['weight'];
            });
            $provinsi = $this->rajaOngkirService->getProvince();
            $breadcrumb = 'Checkout';
            return view('home.pages.checkout.data',compact('cart', 'subtotal', 'weight_total','provinsi','breadcrumb'));
        } else {
            return redirect()->back()->with('error','Login dahulu');
        }

        // $cart = $this->getCarts();
        // $subtotal = collect($cart)->sum(function($q){
        //     return $q['qty'] * $q['price'];
        // });
        // $weight_total = collect($cart)->sum(function($q){
        //     return $q['qty'] * $q['weight'];
        // });
        // $provinsi = $this->rajaOngkirService->getProvince();
        // return view('home.pages.checkout.data',compact('cart', 'subtotal', 'weight_total','provinsi'));
    }

    public function process(Request $request)
    {
        $cart = $this->getCarts();
        $subtotal = collect($cart)->sum(function ($q)
            {
                return $q['qty'] * $q['price'];
            });

        // $book = Book::findOrFail($id);
        // $transaction = Transaction::create([
        //     // 'code_transaction' => 'INV'- Carbon::now(),
        //     'code_transaction' => 'INV' . '-' . time(),
        //     'user_id' => Auth::user()->id,
        //     'transaction_total' => $subtotal + $request->ongkir,
        //     'transaction_status' => 'In_Cart',
        //     'bank_name' => 'BNI',
        //     'va_number' => 12,
        //     'courier' => $request->courier,
        //     'cost' => $request->ongkir
        // ]);
        $trx = $this->transactionService->save($request);

        foreach ($cart as $item) {
            $product = Product::with(['productImages'])->find($item['product_id']);
            $this->productService->updateStock($item['qty'],$product->id);
            TransactionDetail::create([
                'transaction_id' => $trx->id,
                'qty' => $item['qty'],
                'product_id' => $item['product_id'],
                'transaction_subtotal' => $item['qty'] * $product->price,
            ]);
        }
        //
        SendWa::sendNotifAdmin($trx->code,$trx->transaction_total,$trx->transaction_status);
        $cart = [];
        $cookie = cookie('konveksi-carts',json_encode($cart),2880);
        return redirect()->route('member.detail.transaction', $trx->code)->cookie($cookie);
    }

    public function postCallback(Request $request)
    {
        //  return $request;
        $get_json   = json_decode($request->get('json'));
        // return $get_json;
        if (isset($get_json->order_id)) {
            $update_order               = Transaction::where('code',$get_json->order_id)->first();
            $update_order->payment_type = $get_json->payment_type;
            if ($get_json->payment_type == "echannel") {
                $update_order->bank_name      = 'mandiri';
                $update_order->va_number      = $get_json->bill_key;
                $update_order->bill_code      = $get_json->biller_code;
            }elseif($get_json->payment_type == "qris"){
                $update_order->bank_name      = 'qris';
                $update_order->payment_type      = 'qris';
            }else{
                foreach ($get_json->va_numbers as $card) {
                    $update_order->bank_name      = $card->bank ?? '';
                    $update_order->va_number      = $card->va_number ?? '';
                }
            }
            $update_order->save();
            return redirect()->route('member.dashboard')->with('success','Iklan berhasil dibuat');
        }
        return redirect()->route('member.dashboard');
    }
}
