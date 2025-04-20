<?php

use App\Http\Controllers\Api\Customer\CardImageController;
use App\Http\Controllers\Api\Customer\EventController;
use App\Http\Controllers\Api\Customer\EventImageCommentLikeDislikeController;
use App\Http\Controllers\Api\Customer\EventImageController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\Customer\EventImageCommentController;
use App\Http\Controllers\Api\Customer\EventImageLikeDislikeController;
use App\Http\Controllers\Api\Customer\EventInvitationController;
use App\Http\Controllers\Api\Customer\EventJoinController;
use App\Http\Controllers\Api\Customer\EventReviewController;
use App\Http\Controllers\Api\Customer\VendorController;
use App\Http\Controllers\Api\Customer\VendorFaqController;
use App\Http\Controllers\Api\Vendor\FaqController;
use App\Http\Controllers\Api\Vendor\ServiceController;
use App\Http\Controllers\Api\Vendor\ServicePricingController;
use App\Http\Controllers\Api\Vendor\VendorProfileController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\Vendor\GalleryController;
use App\Http\Controllers\Api\Vendor\VendorReviewController;
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
        // Event Api
        Route::get('get-categories',[EventController::class,'getcategories']);
        Route::get('get-trending-event',[EventController::class,'getHomeEvents']);
        Route::get('events',[EventController::class,'index']);
        Route::get('all-events',[EventController::class,'getAllEvents']);
        Route::get('get-event/{id}',[EventController::class,'show']);
        Route::post('event-store',[EventController::class,'store']);
        Route::post('event-update',[EventController::class,'update']);
        Route::post('event-like-dislike',[EventController::class,'eventLikeDislike']);
        Route::get('get-liked-events',[EventController::class,'getLikedEvents']);
        Route::get('get-disliked-events',[EventController::class,'getDisLikedEvents']);
        Route::get('get-recent-events',[EventController::class,'getRecentEvents']);
        Route::post('store-recent-event',[EventController::class,'storeRecentEvent']);
        
        // Card Image Api
        Route::get('get-card-images',[CardImageController::class,'index']);

        // Event Image
        Route::get('get-event-images',[EventImageController::class,'getEventImages']);
        Route::get('delete-event-image/{id}',[EventImageController::class,'destroy']);
        Route::post('store-event-image',[EventImageController::class,'storeEventImage']);
        
        // Event invitation
        Route::get('get-event-invitations',[EventInvitationController::class,'index']);
        Route::post('store-event-invitation',[EventInvitationController::class,'store']); 
        
        // Event invitation
        Route::get('get-event-image-comments',[EventImageCommentController::class,'index']);
        Route::get('get-event-image-sub-comments',[EventImageCommentController::class,'getSubComments']);
        Route::post('store-event-image-comment',[EventImageCommentController::class,'store']);
        Route::post('delete-event-image-comment',[EventImageCommentController::class,'delete']);
                      
        // Event Join
        Route::get('get-join-event',[EventJoinController::class,'index']);
        Route::post('join-event',[EventJoinController::class,'store']);                      
        
        // Event Review
        Route::get('get-event-reviews',[EventReviewController::class,'index']);
        Route::post('store-event-review',[EventReviewController::class,'store']);
              
        // Event Image Like Dislike
        Route::get('get-liked-event-images',[EventImageLikeDislikeController::class,'index']);
        Route::get('get-disliked-event-images',[EventImageLikeDislikeController::class,'index']);
        Route::post('store-event-image-like-dislike',[EventImageLikeDislikeController::class,'store']);              
        
        // Event Image Comment Like Dislike
        Route::post('store-event-image-comment-like-dislike',[EventImageCommentLikeDislikeController::class,'store']);
        // Vendor Profile 
        Route::get('get-vendor-detail', [VendorController::class,'getVendorDetail']);
        
        Route::get('get-vendor-types', [VendorController::class,'getVendorTypes']);
        
        // Vendor FAQ 
        Route::get('get-vendor-faqs/{id}', [VendorFaqController::class,'index']);


    }); 
    Route::post('profile-update',[ProfileController::class,'update']);
    Route::get('logout', [AuthController::class,'logout']);
    Route::group(['prefix' => 'vendor','middleware' => 'vendor'], function () { 
        Route::get('get-vendor-detail', [VendorProfileController::class,'getVendorDetail']);
        
        Route::get('get-vendor-types', [VendorProfileController::class,'getVendorTypes']);
        Route::post('update-vendor-type', [VendorProfileController::class,'updateVendorType']);
        Route::post('update-vendor-profile', [VendorProfileController::class,'updateVendorProfile']);
              
        // Gallery Routes
        Route::get('get-gallery',[GalleryController::class,'index']);
        Route::get('delete-gallery/{id}',[GalleryController::class,'destory']);
        Route::post('store-gallery',[GalleryController::class,'store']);    

        // Service Routes
        Route::get('get-services',[ServiceController::class,'index']);
        Route::get('delete-service/{id}',[ServiceController::class,'destory']);
        Route::post('store-services',[ServiceController::class,'store']);

        // Faq Routes
        Route::get('get-faqs',[FaqController::class,'index']);
        Route::get('delete-faq/{id}',[FaqController::class,'destory']);
        Route::post('store-faq',[FaqController::class,'store']);
        Route::post('update-faq',[FaqController::class,'update']);
        // Review Routes
        Route::get('get-reviews',[VendorReviewController::class,'index']);
        Route::post('store-review',[VendorReviewController::class,'store']);
    });
});
