<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(){
        $roles = Role::get();
        return view('role-permission.role.index', [
            'roles' => $roles
        ]);
    }

    public function create(){
        return view('role-permission.role.create',
    );
    }

    public function store(Request $request){
  $request->validate([
        'name' =>[
        'required',
        'string',
        'unique:roles,name'
    ]
    ]);

Role::create([
      'name' => $request->name
]);

return redirect('roles')->with('status','Role created successfully');

    }

    public function edit(Role $role){
        return view('role-permission.role.edit',[
     'role' => $role
    ]);
}


    public function update (Request $request, Role $role){
        $request->validate([
            'name' =>[
            'required',
            'string',
            'unique:roles,name,'.$role->id
        ]
        ]);

        $role->update([
            'name'=> $request->name
        ]);
return redirect('roles')->with('status','Role has updated successfully');
    }


    public function destroy($roleId){
  
       $role = Role::find($roleId);
       $role->delete();
        return redirect('roles')->with('status','Role deleted successfully');
    }



public function addPermissionToRole($roleId){

    $permissions = Permission::get();
    $role = Role::findOrFail($roleId);
    $rolePermissions = DB::table('role_has_permissions')
                     ->where('role_id', $role->id)
                    ->pluck('permission_id')
                    ->toArray();
                 

    return view('role-permission.role.add-permissions',[
        'role'=> $role,
        'permissions' => $permissions,
        'rolePermissions' => $rolePermissions
    ]);
}

public function givePermissionToRole(Request $request, $roleId){

    $request->validate([
        'permission' => 'required'
    ]);

    $role = Role::findOrFail($roleId);
    $role->syncPermissions($request->permission);

    return redirect()->back()->with('status','Permissions added to role ');
}
}

