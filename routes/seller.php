<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Seller\Auth\RegisterController as SellerRegisterController;
use App\Http\Controllers\Backend\Seller\Auth\LoginController as SellerLoginController;
use App\Http\Controllers\Backend\Seller\DashboardController as SellerDashboardController;
use App\Http\Controllers\Backend\Seller\SellerProfileController;

// Vendor Auth Routes
Route::group(['prefix' => 'seller', 'as' => 'seller.'], function () {
  Route::controller(SellerLoginController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login'); // Seller Login Form
    Route::post('/login', 'login')->name('login.submit'); // Seller Login Submit (Handled by AuthenticatesUsers)
    Route::post('/logout', 'logout')->name('logout');
  });

  Route::controller(SellerRegisterController::class)->group(function () {
    Route::get('/register', 'showRegistrationForm')->name('register'); // Seller Register Form
    Route::post('/register', 'register')->name('register.submit'); // Seller Register Submit
  });
});


Route::group(['middleware' => 'auth:seller', 'prefix' => 'seller'], function () {
  Route::get('/profile', [SellerDashboardController::class, 'profile'])->name('seller.profile');

  Route::get('/profile-show', [SellerProfileController::class, 'show'])->name('seller.profile_show');
  Route::get('/profile/edit{sellerId}', [SellerProfileController::class, 'edit'])->name('seller.profile.edit');
  Route::put('/profile/update{sellerId}', [SellerProfileController::class, 'update'])->name('seller.profile.update');

  // Password routes
  Route::get('/profile/password', [SellerProfileController::class, 'showChangePasswordForm'])->name('seller.profile.password');
  Route::put('/profile/password/update', [SellerProfileController::class, 'updatePassword'])->name('seller.profile.password.update');

});
