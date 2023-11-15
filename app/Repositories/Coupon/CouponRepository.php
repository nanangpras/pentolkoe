<?php

namespace App\Repositories\Coupon;

use App\Models\Coupon;
use App\Repositories\Coupon\InterfaceCoupon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CouponRepository implements InterfaceCoupon
{
    protected $coupon;

    public function __construct(Coupon $coupon)
    {
        $this->coupon = $coupon;
    }


    public function getAll()
    {
        return $this->coupon->orderBy('created_at','desc')->get();
    }

    public function getById($id)
    {
        return $this->coupon->where('id',$id)->first();
    }

    public function getByCode($code)
    {
        return $this->coupon->where('code',$code)->first();
    }

    public function save(Request $request)
    {
        $coupon                 = new $this->coupon;
        $coupon->name           = $request->name;
        $coupon->code           = $request->code;
        $coupon->description    = $request->description;
        $coupon->type           = $request->type;
        $coupon->discount_rate  = $request->discount_rate;
        $coupon->start_date     = $request->start_date;
        $coupon->end_date       = $request->end_date;
        $coupon->save();

        return $coupon->fresh();
    }

    public function delete($id)
    {
        $coupon = $this->coupon->find($id);
        $coupon->delete();
    }

    public function update(Request $request, $id)
    {
        $update = $this->coupon->find($id);

        $update->name           = $request->name;
        $update->code           = $request->code;
        $update->type           = $request->type;
        $update->discount_rate  = $request->discount_rate;
        $update->start_date     = $request->start_date;
        $update->end_date       = $request->end_date;
        $update->save();
        return $update->fresh();
    }
}
