<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;

Route::resource('permissions',App\Http\Controllers\PermissionController::class);
Route::get('permissions/{permissionId}/delete',[App\Http\Controllers\PermissionController::class,'destroy']);