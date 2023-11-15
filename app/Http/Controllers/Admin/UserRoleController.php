<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function updatePermissionId($id)
    {
        $role       = Role::all();
        $permission = Permission::all();
        $editUser   = User::find($id);
        return view('admin.pages.user.edit-role',compact('role', 'permission','editUser'));
    }

    public function updatePermission(Request $request, $id)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'bail|required|min:2',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'required|min:1'
        ]);

        $roles = $request->get('role_id', []);
        $permissions = $request->get('permission_id', []);

        $user = User::find($id);
        $user->syncRoles($roles);
        $user->syncPermissions($permissions);
        // $user->syncPermissions($request['permission_id']);
        // $user->syncRole($request['role_id']);
        $user->save();
        return redirect()->route('user.index');
    }

    private function syncPermissions(Request $request, $user)
    {
        // Get the submitted roles
        $roles = $request->get('role_id', []);
        $permissions = $request->get('permission_id', []);

        // Get the roles
        $roles = Role::find($roles);

        // check for current role changes
        if( ! $user->hasAllRoles( $roles ) ) {
            // reset all direct permissions for user
            $user->permissions()->sync([]);
        } else {
            // handle permissions
            $user->syncPermissions($permissions);
        }

        $user->syncRoles($roles);
        return $user;
    }
}
