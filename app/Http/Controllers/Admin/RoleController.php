<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $data = Role::all();
        return view('admin.pages.role.data',compact('data'));
    }

    public function add (Request $request)
    {
        $model = new Role;
        if($request->id!=0 && Role::find($request->id)!=null){
            $model = Role::find($request->id);
        }

        $model->name = $request->role_name;
        $model->save();

        return redirect()->back()->with('success','Data berhasil ditambah');
    }
}
