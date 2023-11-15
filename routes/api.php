<?php

use App\Http\Controllers\Api\Payment\PaymentCallbackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('payment/midtrans/new-notif', [PaymentCallbackController::class, 'recieve']);
Route::get('payment/midtrans-success', [PaymentCallbackController::class, 'success']);
Route::get('payment/midtrans-unfinish', [PaymentCallbackController::class, 'unfinish']);
Route::get('payment/midtrans-error', [PaymentCallbackController::class, 'error']);
