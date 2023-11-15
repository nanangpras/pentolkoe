<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\ProductService;
use App\Service\TransactionService;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    protected $trxService;
    protected $productService;

    public function __construct(
        TransactionService $trxService,
        ProductService $productService
    )
    {
        $this->trxService = $trxService;
        $this->productService = $productService;
    }

    public function index()
    {
        $count_transaction = $this->trxService->getAll()->count();
        $income = $this->trxService->income();
        $pending = $this->trxService->transactionPending();
        $lastFive = $this->trxService->fiveLatestTransaction();
        $popularProduct = $this->productService->popularProduct();
        return view('admin.dashboard',compact('count_transaction','income','pending','lastFive','popularProduct'));
    }

    public function listTransactions()
    {
        $transaction = $this->trxService->getAll();
        return view('admin.pages.transactions.list',compact('transaction'));
    }

    public function detailTransactions(Request $request,$code)
    {
        $detail = $this->trxService->getByCode($code);
        if ($request->key == "progress_done") {
            return view('admin.pages.transactions.modal.progress',compact('detail'));
        } else {
            return view('admin.pages.transactions.detail',compact('detail'));
        }
        return view('admin.pages.transactions.detail',compact('detail'));
    }

    public function updateProgressTrx(Request $request, $id)
    {
        $this->trxService->updateProgressTransaction($request, $id);
        return redirect()->route('transaction.list')->with('success','Progress berhasil diupdate');
    }
}
