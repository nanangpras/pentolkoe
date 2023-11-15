<?php

namespace App\Repositories\RajaOngkir;
use Illuminate\Http\Request;


interface InterfaceRajaOngkir
{
    public function getProvince();
    public function getCity($id);
    public function getSubdistrict($id);
}
