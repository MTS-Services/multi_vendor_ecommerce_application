<?php

use App\Http\Controllers\Backend\Admin\ProductManagement\ProductAttributeValueController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;


Route::group(['as' => 'frontend.'], function () {


  // Home Page
  Route::get('/', [HomePageController::class, 'home'])->name('home');

    // Test Page
    Route::get('/test', [FrontendController::class, 'test'])->name('test');
    //Shop Page
    Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
    //Wishlist Page
    Route::get('/wishlist', [FrontendController::class, 'wishlist'])->name('whishlist');

    // Singel Product
    Route::get('/singel-product', [FrontendController::class, 'singel_product'])->name('singel_product');
    //   Store location
    Route::get('/store-location', [FrontendController::class, 'store_location'])->name('store_location');
});

