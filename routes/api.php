<?php

use App\Http\Controllers\Api\Customer\EventController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Vendor\VendorProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('customer/login',[AuthController::class,'customerLogin']);
Route::post('register',[AuthController::class,'register']);
Route::post('vendor/login',[AuthController::class,'vendorLogin']);
Route::post('send_verification_code', [AuthController::class,'sendVerificationCode']);
Route::post('verify_otp', [AuthController::class,'verifyOtp']);
Route::post('verify_otp_for_password', [AuthController::class,'verifyOtpForPassword']);
Route::post('set_new_password', [AuthController::class,'setNewPassword']);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::group(['prefix' => 'customer','middleware' => 'customer'], function () { 
        Route::get('get-categories',[EventController::class,'getcategories']);
        Route::get('events',[EventController::class,'index']);
        Route::get('all-events',[EventController::class,'getAllEvents']);
        Route::get('get-event/{id}',[EventController::class,'show']);
        Route::post('event-store',[EventController::class,'store']);
        Route::post('event-like-dislike',[EventController::class,'eventLikeDislike']);
        Route::get('get-liked-events',[EventController::class,'getLikedEvents']);
        Route::get('get-disliked-events',[EventController::class,'getDisLikedEvents']);
        Route::get('get-recent-events',[EventController::class,'getRecentEvents']);
        Route::post('store-recent-event',[EventController::class,'storeRecentEvent']);
    }); 
    Route::post('profile-update',[EventController::class,'update']);
    Route::get('logout', [AuthController::class,'logout']);
    Route::group(['prefix' => 'vendor','middleware' => 'vendor'], function () { 
        Route::get('get-vendor-types', [VendorProfileController::class,'getVendorTypes']);
        Route::post('update-vendor-type', [VendorProfileController::class,'updateVendorType']);
        Route::post('update-vendor-profile', [VendorProfileController::class,'updateVendorProfile']);
    });
});
