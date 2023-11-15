<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\CouponService;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $couponService;

    public function __construct(CouponService $couponService)
    {
        $this->couponService = $couponService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coupon = $this->couponService->getAll();
        return view('admin.pages.coupon.index',compact('coupon'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->couponService->save($request);
        return redirect()->route('coupon.index')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editCoupon = $this->couponService->getById($id);
        return view('admin.pages.coupon.edit',compact('editCoupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->couponService->update($request,$id);
        return redirect()->route('coupon.index')->with('success','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->couponService->delete($id);
        return redirect()->route('coupon.index')->with('success','Data berhasil dihapus');
    }
}
