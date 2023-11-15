<?php

namespace App\Repositories\Articles;
use Illuminate\Http\Request;
use App\Models\Category;


interface InterfaceArticle
{
    public function getAll();
    public function getById($id);
    public function getBySlug($slug);
    public function save(Request $request);
    public function update(Request $request,$id);
    public function delete($id);
}
