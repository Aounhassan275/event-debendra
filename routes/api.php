<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('admin/login',[AuthController::class,'adminLogin']);
Route::post('vendor/login',[AuthController::class,'vendorLogin']);
Route::post('vendor/register',[AuthController::class,'vendorRegister']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'admin','middleware' => 'admin'], function () { 
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    }); 
    Route::group(['prefix' => 'vendor','middleware' => 'vendor'], function () { 
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
});
