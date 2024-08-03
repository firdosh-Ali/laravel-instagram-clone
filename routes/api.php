<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\PhotoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);


Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout',[AuthController::class,'logout']);

    Route::get('/user',[UserController::class,'show']);
});

Route::post('/photos/upload', [PhotoController::class, 'upload']);
Route::delete('/photos/{id}', [PhotoController::class, 'delete']);
Route::get('/photos', [PhotoController::class, 'fetch']);
