<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\user;

class RoleController extends Controller
{
    public function RoleIndex()
    {
        // $permission = Permission::create(['name' => 'delete product']);

        return view('admin.role.index',[
            'users' => User::where('roled_id','!=', 2)->get(),
            'roles' => Role::latest()->get(),
            'permissions' => Permission::all()
        ]);
        
    }

    public function RoleStore(Request $request)
    {
        $request->validate([
            'role_name' => 'required|unique:roles,name'
        ]);
        $role = Role::create(['name' => $request->role_name]);
        $role->givePermissionTo($request->permission);
        return back();
    }

    public function RoleAssign(Request $request)
    {

        $user = User::findOrFail($request->user_id);
        $user->syncRoles($request->name);
        return back();
    }

    public function PermissionEdit($id)
    {
        return view('admin.role.edit',[
              'permissions' => Permission::all(),
              'user'  => User::findOrFail($id),
        ]);
    }

    public function PermissionUpdate(Request $request)
    {

        $user = User::findOrFail($request->user_id);
        $user->syncPermissions($request->permission);
        $notification=array(
            'message'=>'Permission Update Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('role.index')->with($notification);
    }
}
