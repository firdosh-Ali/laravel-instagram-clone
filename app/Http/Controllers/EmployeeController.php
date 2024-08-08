<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index(){
        $employees = Employee::get();
        return view('role-permission.employee.index',[
            'employees' => $employees
        ]);
    }

    public function create(){
        $roles = Role::pluck('name','name')->all();
        return view('role-permission.employee.create',[
            'roles'=>$roles
        ]);
     
    }

    public function store(Request $request){
       
       $request->validate([
        'name' => 'required|string|max:255',
        'email'=> 'required|email|max:255|email',
        'password' => 'required|string',
        'roles' => 'required'
       ]);
    $employee = Employee::create([
        'name'=>$request->name,
        'email' =>$request->email,
        'password' => Hash::make($request->password),

    ]); 
$employee->syncRoles([$request->roles]);
return redirect('/employees')->with('status', 'Employees created succesfully with roles');
    }


    public function edit(Employee $employee){
        $roles = Role::pluck('name','name')->all();
        $employeeRoles = $employee->roles->pluck('name','name')->all();
        return view('role-permission.employee.edit',[
            'employee' => $employee,
            'roles'=> $roles,
            'employeeRoles' => $employeeRoles
        ]);
}

public function update(Request $request, Employee $employee){
    $request->validate([
        'name' => 'required|string|max:255',
        'password' => 'nullable|string',
        'roles' => 'required'
       ]);

       $data = [
        'name'=>$request->name,
        'email' =>$request->email,
       ];

       if(!empty($request->password))
   $data += [
    'password' => Hash::make($request->password),
];
       $employee->update($data);
       $employee->syncRoles([$request->roles]);

       return redirect('/employees')->with('status', 'Employees Updated succesfully with roles');
}

public function destroy($employeeId){
$employee = Employee::findOrFail($employeeId);
$employee->delete();
return redirect('/employees')->with('status','Employees deleted successfullt');
}

}
