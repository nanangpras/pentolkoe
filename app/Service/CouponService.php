<?php

namespace App\Service;

use App\Repositories\Coupon\CouponRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;
use Exception;

class CouponService
{
    protected $coupon;
    public function __construct(CouponRepository $coupon)
    {
        $this->coupon = $coupon;
    }

    public function getAll()
    {
        return $this->coupon->getAll();
    }

    public function getById($id)
    {
        return $this->coupon->getById($id);
    }

    public function getByCode($code)
    {
        return $this->coupon->getByCode($code);
    }

    public function update(Request $request, $id)
    {
        return $this->coupon->update($request,$id);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'discount_rate' => 'required',
            'type' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        $result = $this->coupon->save($request);

        return $result;
    }

    public function delete($id)
    {
        return $this->coupon->delete($id);
    }
}
