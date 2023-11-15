<?php

namespace App\Repositories\Subcategory;
use Illuminate\Http\Request;
use App\Models\Category;


interface InterfaceSubcategory
{
    public function getAll();
    public function getById($id);
    public function save(Request $request);
    public function update(Request $request,$id);
    public function delete($id);
}
