<?php

namespace App\Repositories\Product;
use Illuminate\Http\Request;


interface InterfaceProduct
{
    public function getAll();
    public function getById($id);
    public function getBySlug($slug);
    public function save(Request $request);
    public function update(Request $request,$id);
    public function delete($id);
}
