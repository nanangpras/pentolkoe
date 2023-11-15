<?php

namespace App\Service;
use App\Repositories\RajaOngkir\RajaOngkirRepository;

class RajaOngkirService
{
    protected $ongkir;
    public function __construct(RajaOngkirRepository $ongkir)
    {
        $this->ongkir = $ongkir;
    }

    public function getProvince()
    {
        return $this->ongkir->getProvince();
    }

    public function getCity($id)
    {
        return $this->ongkir->getCity($id);
    }

    public function getCityAll()
    {
        return $this->ongkir->getCityAll();
    }

    public function getSubdistrict($id)
    {
        return $this->ongkir->getSubdistrict($id);
    }
}
