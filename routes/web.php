<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\EmployeeController;

Route::resource('permissions',App\Http\Controllers\PermissionController::class);
Route::get('permissions/{permissionId}/delete',[App\Http\Controllers\PermissionController::class,'destroy']);

Route::resource('roles',App\Http\Controllers\RoleController::class);
Route::get('roles/{roleId}/delete',[App\Http\Controllers\RoleController::class,'destroy']);
Route::get('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class,'addPermissionToRole']);
Route::put('roles/{roleId}/give-permissions', [App\Http\Controllers\RoleController::class,'givePermissionToRole']);

Route::resource('employees', App\Http\Controllers\EmployeeController::class);
Route::get('employees/{employeeId}/delete',[App\Http\Controllers\EmployeeController::class,'destroy']);