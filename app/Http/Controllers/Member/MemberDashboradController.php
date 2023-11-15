<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Service\ProductService;
use App\Service\RajaOngkirService;
use App\Service\TransactionService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberDashboradController extends Controller
{
    protected $trxService;
    protected $rajaOngkirService;
    protected $productService;

    public function __construct(
        TransactionService $trxService,
        RajaOngkirService $rajaOngkirService,
        ProductService $productService
    )
    {
        $this->trxService        = $trxService;
        $this->rajaOngkirService = $rajaOngkirService;
        $this->productService = $productService;
    }

    public function index()
    {
        $popularProduct = $this->productService->popularProduct();
        $pending        = $this->trxService->transactionPendingUser(Auth::user()->id);
        $success        = $this->trxService->transactionSuccessUser(Auth::user()->id);
        $cancel         = $this->trxService->transactionCancelUser(Auth::user()->id);
        $productUser    = self::categoryProductTransaction(Auth::user()->id);
        return view('member.pages.dashboard.dashboard-member',compact('popularProduct','pending','success','cancel','productUser'));
    }

    public function detailTransaction($code)
    {
        $detail = $this->trxService->getByCode($code);
        $productUser    = self::categoryProductTransaction(Auth::user()->id);
        // dd($detail);
        return view('member.pages.transaction.detail',compact('detail','productUser'));
    }

    public function myTransaaction($id)
    {
        $user_id = Auth::user()->id;
        $data = $this->trxService->getMyTransaction($user_id);
        $productUser    = self::categoryProductTransaction(Auth::user()->id);
        return view('member.pages.transaction.data',compact('data','productUser'));
    }

    public function myTransaactionProduct($user,$category)
    {
        $data = $this->trxService->productUserBuy($user,$category);
        $productUser    = self::categoryProductTransaction(Auth::user()->id);
        return view('member.pages.transaction.product.data',compact('data','productUser'));
        // return dd($data);
    }

    public function categoryProductTransaction($user)
    {
        $user = Auth::user()->id;
        $data = $this->trxService->cekCategoryProductTransaction($user);
        return $data;
        // dd($data);
    }
}
