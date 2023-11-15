<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Controller;
use App\Models\RequestIklan;
use App\Models\Transaction;
use App\Service\Midtrans\CallbackService;
use Illuminate\Http\Request;

class PaymentCallbackController extends Controller
{
    public function recieve (){
        $callback = new CallbackService;
        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();

            if ($callback->isSuccess()) {
                Transaction::where('code', $order->code)->update([
                    'transaction_status' => 'SUCCESS',
                    'progress_status'    => 'Diterima',
                ]);
            }

            if ($callback->isExpire()) {
                Transaction::where('code', $order->code)->update([
                    'transaction_status' => 'EXPIRED',
                    'progress_status'    => 'Selesai',
                ]);
            }

            if ($callback->isCancelled()) {
                Transaction::where('code', $order->code)->update([
                    'transaction_status' => 'CANCEL',
                    'progress_status'    => 'Selesai',
                ]);
            }

            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        }else{
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }

    // alternative
    public function callback_midtrans(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hased     = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hased == $request->signature_key) {
            if ($request->transaction_status == 'settlement') {
                $request_iklan = Transaction::where('code',$request->order_id)->first();
                $request_iklan->transaction_status = 'SUCCESS';
                $request_iklan->save();
            }
            if ($request->transaction_status == 'pending') {
                $request_iklan = Transaction::where('code',$request->order_id)->first();
                $request_iklan->transaction_status = 'PENDING';
                $request_iklan->save();
            }
            if ($request->transaction_status == 'deny') {
                $request_iklan = Transaction::where('code',$request->order_id)->first();
                $request_iklan->transaction_status = 'REJECT';
                $request_iklan->save();
            }
            if ($request->transaction_status == 'expire') {
                $request_iklan = Transaction::where('code',$request->order_id)->first();
                $request_iklan->transaction_status = 'EXPIRE';
                $request_iklan->save();
            }
        }

    }

    public function success(Request $request)
    {
        $code_order = $request->order_id;
        $order = Transaction::where('code',$code_order)->first();
        return view('member.pages.transaction.success',compact('order'));
    }

    public function unfinish(Request $request)
    {
        $code_order = $request->order_id;
        $order = Transaction::where('code',$code_order)->first();
        return view('member.pages.transaction.unfinish',compact('order'));
    }

    public function error(Request $request)
    {
        $code_order = $request->order_id;
        $order = Transaction::where('code',$code_order)->first();
        return view('member.pages.transaction.error',compact('order'));
    }
}
