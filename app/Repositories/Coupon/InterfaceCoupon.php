<?php

namespace App\Repositories\Coupon;
use Illuminate\Http\Request;
use App\Models\Category;


interface InterfaceCoupon
{
    public function getAll();
    public function getById($id);
    public function save(Request $request);
    public function getByCode($code);
    public function update(Request $request,$id);
    public function delete($id);
}
