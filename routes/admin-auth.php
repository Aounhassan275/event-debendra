<?php

// use App\Http\Controllers\admin\Auth\LoginController;
// use App\Http\Controllers\admin\Auth\RegisteredUserController;
// use Illuminate\Support\Facades\Route;

// Route::prefix('admin')->middleware('guest:admin')->group(function () {
//     Route::get('register', [RegisteredUserController::class, 'create'])->name('admin.register');

//     Route::post('register', [RegisteredUserController::class, 'store'])->name('register');

//     Route::get('login', [LoginController::class, 'create'])->name('admin.login');

//     Route::post('login', [LoginController::class, 'store']);

// });

// Route::prefix('admin')->middleware('auth:admin')->group(function () {

//     Route::get('/dashboard', function () {
//         return view('admin.dashboard');
//     })->name('admin.dashboard');

//     Route::get('/category', function () {
//         return view('admin.manage_category');
//     })->name('admin.category');


//     Route::post('logout', [LoginController::class, 'destroy'])->name('admin.logout');
// });
