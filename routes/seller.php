<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Seller\Auth\RegisterController as SellerRegisterController;
use App\Http\Controllers\Backend\Seller\Auth\LoginController as SellerLoginController;
use App\Http\Controllers\Backend\Seller\DashboardController as SellerDashboardController;
use App\Http\Controllers\Backend\Seller\product_management\BrandController;
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
});


