<?php

use App\Http\Controllers\admin\AddSliderController;
use App\Http\Controllers\admin\AddCardImageController;
use App\Http\Controllers\admin\AddCategoryController;
use App\Http\Controllers\admin\AddUserController;
use App\Http\Controllers\admin\AdminEventController;
use App\Http\Controllers\admin\BookingListController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\EditEventController;
use App\Http\Controllers\admin\EditUserProfileController;
use App\Http\Controllers\admin\EventBookingController;
use App\Http\Controllers\admin\EventImageController;
use App\Http\Controllers\admin\FavoriteEventController;
use App\Http\Controllers\admin\ManageCardImageController;
use App\Http\Controllers\admin\ManageContactController;
use App\Http\Controllers\admin\ManageEventFeedController;
use App\Http\Controllers\admin\ManageReportsController;
use App\Http\Controllers\admin\ManageSliderController;
use App\Http\Controllers\admin\ManageUserController;
use App\Http\Controllers\admin\RecentEventController;
use App\Http\Controllers\admin\ContactSubjectController;
use App\Http\Controllers\admin\DeleteUserController;
use App\Http\Controllers\admin\EditSliderController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\MenuController;
use App\Http\Controllers\admin\RegisteredEventController;
use App\Http\Controllers\admin\SendNotificationController;
use App\Http\Controllers\admin\SettingsController;
use App\Http\Controllers\admin\SmtpSettingsController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\TestimonialController;
use App\Http\Controllers\admin\UserEventController;
use App\Http\Controllers\admin\UserProfileController;
use App\Http\Controllers\admin\VendorTypeController;
use App\Http\Controllers\Auth\AuthController as AuthAuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\vendor\auth\AuthController;
use App\Http\Controllers\vendor\DashboardController as VendorDashboardController;
use Illuminate\Auth\Events\Login;
use App\Http\Controllers\vendor\PricingController;
use App\Http\Controllers\vendor\GalleryController;
use App\Http\Controllers\vendor\ReviewController;
use App\Http\Controllers\Web\IndexController;

Route::get('/login', [AuthAuthController::class, 'Login'])->name('login');
Route::post('/login', [AuthAuthController::class, 'checkLogin'])->name('auth.checkLogin');
Route::get('/logout', [AuthAuthController::class, 'logout'])->name('auth.logout');

//vendor register
Route::get('/vendor/register',[AuthAuthController::class, 'register'])->name('vendor.register');
Route::post('/store_register',[AuthAuthController::class, 'storeRegister'])->name('vendor.storeRegister');

//admin
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/add-card-image', [AddCardImageController::class, 'create'])->name('card-image.create');
    Route::get('/card', [ManageCardImageController::class, 'index'])->name('manage_card_image');
    Route::resource('card-images', ManageCardImageController::class);

    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events/store', [EventController::class, 'store'])->name('events.store');
    Route::get('/manage-event', [AdminEventController::class, 'index'])->name('manage_event');
    Route::post('/get_subcategory', [EventController::class, 'getSubCategory'])->name('getSubCategory');

    //navbar
    Route::get('/menu', [MenuController::class, 'list'])->name('menu.list');
    Route::get('/menu/add', [MenuController::class, 'add'])->name('menu.add');
    Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
    Route::post('/menu/update', [MenuController::class, 'update'])->name('menu.update');
    Route::get('/menu/delete/{id}', [MenuController::class, 'delete'])->name('menu.delete');

    //category
    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/save-category', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');

    //subcategory
    Route::get('/subcategory/index', [SubcategoryController::class, 'list'])->name('subcategory.list');
    Route::get('/subcategory/add', [SubcategoryController::class, 'add'])->name('subcategory.add');
    Route::post('/subcategory/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
    Route::get('/subcategory/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
    Route::post('/subcategory/update', [SubcategoryController::class, 'update'])->name('subcategory.update');
    Route::get('/subcategory/delete/{id}', [SubcategoryController::class, 'delete'])->name('subcategory.delete');

    // Events
    Route::get('/user-event', [UserEventController::class, 'index'])->name('user_events');
    Route::get('/registered-event', [RegisteredEventController::class, 'index'])->name('registered_event');
    Route::get('edit_event/{id}', [EventController::class, 'edit'])->name('edit-event');
    Route::post('update_event', [EventController::class, 'update'])->name('update-event');
    Route::get('delete_event/{id}', [EventController::class, 'delete'])->name('delete-event');


    Route::get('/recent-event', [RecentEventController::class, 'index'])->name('recent_event');
    Route::get('/event-feed', [ManageEventFeedController::class, 'index'])->name('manage_event_feed');
    Route::get('/event-image', [EventImageController::class, 'index'])->name('event_image');
    Route::get('/favorite-event', [FavoriteEventController::class, 'index'])->name('favorite_event');
    Route::get('/event-booking', [EventBookingController::class, 'index'])->name('event_booking');

    // Slider
    Route::get('slider/list', [ManageSliderController::class, 'index'])->name('manage_slider');
    Route::get('slider/add', [ManageSliderController::class, 'add'])->name('slider.add');
    Route::post('slider/store', [ManageSliderController::class, 'store'])->name('slider.store');
    Route::get('slider/edit/{id}', [ManageSliderController::class, 'edit'])->name('slider.edit');
    Route::post('slider/update', [ManageSliderController::class, 'update'])->name('slider.update');
    Route::get('slider/delete/{id}', [ManageSliderController::class, 'delete'])->name('slider.delete');

    Route::get('/manage-user', [ManageUserController::class, 'index'])->name('normal_users.index');

    //vendor
    Route::get('vendor/list', [VendorTypeController::class, 'vendorList'])->name('vendor.list');

    //vendor type
    Route::get('/vendor_type/list', [VendorTypeController::class, 'list'])->name('vendors.list');
    Route::get('/vendor_type/add', [VendorTypeController::class, 'add'])->name('vendors.add');
    Route::post('/vendor_type/store', [VendorTypeController::class, 'store'])->name('vendors.store');
    Route::get('/vendor_type/edit/{id}', [VendorTypeController::class, 'edit'])->name('vendors.edit');
    Route::post('/vendor_type/update', [VendorTypeController::class, 'update'])->name('vendors.update');
    Route::get('/vendor_type/delete/{id}', [VendorTypeController::class, 'delete'])->name('vendors.delete');

    //testimonial
    Route::get('/testimonial', [TestimonialController::class, 'list'])->name('testimonial.list');
    Route::get('/testimonial/add', [TestimonialController::class, 'add'])->name('testimonial.add');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::post('/testimonial/update', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::get('/testimonial/delete/{id}', [TestimonialController::class, 'delete'])->name('testimonial.delete');

    Route::get('/send-notification', [SendNotificationController::class, 'index'])->name('send_notification');
    Route::get('/manage-reports', [ManageReportsController::class, 'index'])->name('manage_reports');
    Route::get('/manage-contacts', [ManageContactController::class, 'index'])->name('manage_contact');
    Route::get('/add-category', [AddCategoryController::class, 'index'])->name('add_category');
    // Route::get('card-image/create', [CardImageController::class, 'create'])->name('card-image.create');
    // Route::resource('cards', AddCardImageController::class);


    //card
    Route::get('/card/create', [AddCardImageController::class, 'create'])->name('card.create');
    Route::post('/card/store', [AddCardImageController::class, 'store'])->name('card.store');
    Route::get('/card/edit/{id}', [AddCardImageController::class, 'edit'])->name('card.edit');
    Route::post('/card/update', [ManageCardImageController::class, 'update'])->name('card.update');
    Route::get('/card/delete/{id}', [ManageCardImageController::class, 'delete'])->name('card.delete');


    Route::get('/add-user', [AddUserController::class, 'create'])->name('normal_users.create');
    Route::post('/add-user', [AddUserController::class, 'store'])->name('normal_users.store');

    Route::get('/booking', [BookingListController::class, 'index'])->name('booking_list');
    Route::get('/user-profile', [UserProfileController::class, 'index'])->name('user_profile');
    Route::get('/contact-subject', [ContactSubjectController::class, 'index'])->name('contact_subject');
    Route::get('/smtp-settings', [SmtpSettingsController::class, 'index'])->name('smtp_settings');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
    Route::get('/edit-slider', [EditSliderController::class, 'index'])->name('edit_slider');
    Route::view('/api', 'admin.api_urls')->name('api');
    Route::get('edit-user/{id}', [EditUserProfileController::class, 'edit'])->name('normal.users.edit');

    // Route to handle the form submission for updating the user
    Route::put('edit-user/{id}', [EditUserProfileController::class, 'update'])->name('normal.users.update');

    Route::delete('delete-user/{id}', [DeleteUserController::class, 'destroy'])->name('normal.users.destroy');

});

//vendor
Route::group(['middleware' => 'vendor', 'prefix' => 'vendor'], function(){
    Route::get('/vendors',[VendorDashboardController::class, 'vendors'])->name('vendor.vendors');
    Route::post('/vendor_type',[VendorDashboardController::class, 'vendorType'])->name('vendor.vendorType');
    Route::get('/dashboard',[VendorDashboardController::class, 'dashboard'])->name('vendor.dashboard');
    Route::post('/vendor_profile',[VendorDashboardController::class, 'vendorProfile'])->name('vendor.profile');
    Route::get('/review/index', [ReviewController::class, 'review'])->name('vendor.review');

    //gallery
    Route::get('/gallery/index', [GalleryController::class, 'gallery'])->name('vendor.gallery');
    Route::get('/gallery/add', [GalleryController::class, 'add'])->name('gallery.add');
    Route::post('/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::post('/gallery/delete', [GalleryController::class, 'delete'])->name('gallery.delete');

    Route::get('/pricing/index', [PricingController::class, 'pricing'])->name('vendor.pricing');
    Route::post('/pricing/store', [PricingController::class, 'store'])->name('pricing.store');
});

//web
Route::get('/',[IndexController::class, 'index'])->name('web.index');
Route::get('/about',[IndexController::class, 'about'])->name('web.about');
Route::get('/contact',[IndexController::class, 'contact'])->name('web.contact');
Route::get('/events',[IndexController::class, 'events'])->name('web.events');


require __DIR__ . '/auth.php';
require __DIR__ . '/admin-auth.php';
