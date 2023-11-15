<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index ()
    {
        $permission = Permission::all();
        return view('admin.pages.permission.data',compact('permission'));
    }

    public function add (Request $request)
    {
        $permission = new Permission();
        if($request->id!=0 && Permission::find($request->id)!=null){
            $permission = Permission::find($request->id);
        }

        $permission->name = $request->permission_name;
        $permission->save();

        return redirect()->back()->with('success','Data berhasil ditambah');

    }
}
