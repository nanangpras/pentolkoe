<?php

namespace App\Helpers;


class CartCookie

{
    public function getCarts()
    {
        $cart = json_decode(request()->cookie('konveksi-carts'), true);
        $cart = $cart != '' ? $cart:[];
        return $cart;
    }

    public function requestCart()
    {
        $cart_request = json_decode(request()->cookie('konveksi-carts'), true);
        return $cart_request;
    }

    public function getTotalCart()
    {
        $cart       = $this->getCarts();
        $count_cart = count($cart);
        return $count_cart;
    }


}
