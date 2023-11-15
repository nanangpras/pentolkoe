<?php

namespace App\Repositories\Banner;
use Illuminate\Http\Request;
use App\Models\Category;


interface InterfaceBanner
{
    public function getAll();
    public function getById($id);
    public function save(Request $request);
    public function update(Request $request,$id);
    public function delete($id);
}
