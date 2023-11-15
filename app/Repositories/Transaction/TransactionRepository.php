<?php

namespace App\Repositories\Transaction;
use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Repositories\Transaction\InterfaceTransaction;
use App\Service\Midtrans\CreateSnapTokenService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Mockery\CountValidator\AtMost;

class TransactionRepository implements InterfaceTransaction
{
    protected $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function getAll()
    {
        return $this->transaction->get();
    }

    public function myTransaction($id)
    {
        return $this->transaction->with('details')->where('user_id',$id)->get();
    }

    public function getById($id)
    {
        return $this->transaction->where('id',$id)->first();
    }

    public function getByCode($code)
    {
        return $this->transaction->with(['details','details.product'])->where('code',$code)->first();
    }

    public function income()
    {
        return $this->transaction->where('transaction_status', 'SUCCESS')->sum('transaction_total');
    }

    public function updateProgressTransaction(Request $request,$id)
    {
        $update = $this->transaction->where('code',$id)->first();
        // if ($request->progress_status == "Proses") {
        //     $update->where('transaction_status','SUCCESS')
        // }
        $update->progress_status = $request->progress_status;
        $update->notes = $request->notes ?? NULL;
        $update->save();
        return $update->fresh();
    }

    public function getCategoryByTransactionUser($user)
    {
        $trx = Category::join('products', 'categories.id', '=', 'products.category_id')
                        ->join('transaction_details', 'products.id', '=', 'transaction_details.product_id')
                        ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
                        ->where('transactions.user_id', $user) // Ganti dengan ID transaksi yang sesuai
                        ->select('categories.*')
                        ->distinct()
                        ->get();
        return $trx;
    }

    public function transaactionProductUser($user,$category)
    {
        $product = Product::join('transaction_details','products.id', '=', 'transaction_details.product_id')
                            ->join('transactions', 'transaction_details.transaction_id', '=', 'transactions.id')
                            ->join('categories','products.category_id', '=', 'categories.id')
                            ->where('transactions.user_id',$user)
                            ->where('categories.name', $category)
                            ->get();
        return $product;
    }

    public function sumSuccsesUser($user_id)
    {
        return $this->transaction->where('transaction_status', 'SUCCESS')
                                ->where('user_id',$user_id)
                                ->sum('transaction_total');
    }

    public function sumPendingPay()
    {
        return $this->transaction->where('transaction_status', 'PENDING')->sum('transaction_total');
    }

    public function sumPendingPayUser($user_id)
    {
        return $this->transaction->where('transaction_status', 'PENDING')
                                ->where('user_id',$user_id)
                                ->get()->count();
    }

    public function sumCancelPayUser($user_id)
    {
        return $this->transaction->where('transaction_status', 'CANCEL')
                                ->where('user_id',$user_id)
                                ->sum('transaction_total');
    }

    public function topFiveTransaction()
    {
        return $this->transaction->latest()->take(5)->get();
    }

    public function save(Request $request)
    {
        $transaction = new $this->transaction;
        $transaction->code = 'INV' . '-' . time();
        $transaction->user_id = Auth::user()->id;
        $transaction->transaction_total = $request->transaction_total;
        $transaction->transaction_status = 'PENDING';
        $transaction->bank_name = 'bank';
        $transaction->va_number = 'va_number';
        $transaction->courier = 'kurir';
        $transaction->payment_type = 'type';
        $transaction->payment_url = 'url';
        $transaction->coupon_id = $request->idcoupon ?? null;


        $midtrans = new CreateSnapTokenService($transaction,Auth::user());
        $snap_token = $midtrans->getSnapToken();
        $transaction->payment_token = $snap_token;

        $transaction->save();

        return $transaction->fresh();
    }

    public function delete($id)
    {
        $trx = $this->transaction->find($id);
        $trx->delete();
    }

    public function update(Request $request, $id)
    {
        $update = $this->transaction->find($id);
        $update->code = $request->code;
        $update->save();
        return $update->fresh();

    }
}
