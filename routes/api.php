<?php

use App\Http\Controllers\Api\Admin\EventController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('admin/login',[AuthController::class,'adminLogin']);
Route::post('vendor/login',[AuthController::class,'vendorLogin']);
Route::post('send_verification_code', [AuthController::class,'sendVerificationCode']);
Route::post('verify_otp', [AuthController::class,'verifyOtp']);
Route::post('set_new_password', [AuthController::class,'setNewPassword']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'admin','middleware' => 'admin'], function () { 
        Route::get('events',[EventController::class,'index']);
        Route::post('event-store',[EventController::class,'store']);
        Route::get('get-categories',[EventController::class,'getcategories']);
    }); 
    Route::post('profile-update',[EventController::class,'update']);
    Route::get('logout', [AuthController::class,'logout']);
    Route::group(['prefix' => 'vendor','middleware' => 'vendor'], function () { 
        Route::get('/user', function (Request $request) {
            return $request->user();
        });
    });
});
