<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Seller\Auth\RegisterController as SellerRegisterController;
use App\Http\Controllers\Backend\Seller\Auth\LoginController as SellerLoginController;
use App\Http\Controllers\Backend\Seller\Auth\ResetPasswordController;
use App\Http\Controllers\Backend\Seller\DashboardController as SellerDashboardController;
use App\Http\Controllers\Backend\Seller\product_management\BrandController;
use App\Http\Controllers\Backend\Seller\seller_management\SellerController;
use App\Http\Controllers\Backend\Seller\SellerProfileController;
use App\Models\Seller;

// Vendor Auth Routes
Route::group(['prefix' => 'seller', 'as' => 'seller.'], function () {
    Route::controller(SellerLoginController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login'); 
        Route::post('/login', 'login')->name('login.submit'); 
        Route::post('/logout', 'logout')->name('logout');
    });
    Route::group(['as' => 'password.', 'prefix' => 'password'], function () {
        // Admin Forgot Password
        Route::controller(ForgotPasswordController::class)->group(function () {
            Route::get('/forgot', 'showLinkRequestForm')->name('forgot');
            Route::post('/forgot/request', 'sendResetLinkEmail')->name('forgot.request');
        });
        // Admin Password Reset
        Route::controller(ResetPasswordController::class)->group(function () {
            Route::get('/reset/{token}', 'showResetForm')->name('reset');
            Route::post('/reset', 'reset')->name('reset.request');
        });
    });

    Route::controller(SellerRegisterController::class)->group(function () {
        Route::get('/register', 'showRegistrationForm')->name('register'); 
        Route::post('/register', 'register')->name('register.submit');
    });
});


Route::group(['middleware' => 'auth:seller', 'prefix' => 'seller', 'as' => 'seller.'], function () {
    Route::get('/dashboard', [SellerDashboardController::class, 'dashboard'])->name('dashboard');

    Route::controller(SellerProfileController::class)->group(function () {
        Route::get('/profile', 'show')->name('profile_show');
        Route::put('/profile/update', 'profileUpdate')->name('profile.update');
        Route::put('/address/update', 'addressUpdate')->name('address.update');
        Route::put('/password/update', 'passwordUpdate')->name('password.update');
    });

    // Product Management
    Route::group(['as' => 'pm.', 'prefix' => 'product-management'], function () {
        Route::resource('brand', BrandController::class);
        Route::get('brand/status/{brand}', [BrandController::class, 'status'])->name('brand.status');
        Route::get('brand/feature/{brand}', [BrandController::class, 'feature'])->name('brand.feature');
        Route::get('brand/recycle/bin', [BrandController::class, 'recycleBin'])->name('brand.recycle-bin');
        Route::get('brand/restore/{brand}', [BrandController::class, 'restore'])->name('brand.restore');
        Route::delete('brand/permanent-delete/{brand}', [BrandController::class, 'permanentDelete'])->name('brand.permanent-delete');
    });

    // Seller Management
    Route::group(['as' => 'sm.', 'prefix' => 'seller-management'], function () {
        Route::resource('seller', SellerController::class);
        Route::get('seller/status/{seller}', [SellerController::class, 'status'])->name('seller.status');
        Route::get('seller/recycle/bin', [SellerController::class, 'recycleBin'])->name('seller.recycle-bin');
        Route::get('seller/restore/{seller}', [SellerController::class, 'restore'])->name('seller.restore');
        Route::delete('seller/permanent-delete/{seller}', [SellerController::class, 'permanentDelete'])->name('seller.permanent-delete');
    });
});

