<?php

namespace App\Repositories\User;
use Illuminate\Http\Request;


interface InterfaceUser
{
    public function getAll();
    public function getById($id);
    public function save(Request $request);
    public function update(Request $request,$id);
    public function delete($id);
}
