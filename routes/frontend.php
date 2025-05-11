<?php

use App\Http\Controllers\Backend\Admin\ProductManagement\ProductAttributeValueController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\MultiLanguageController;

Route::group(['as' => 'frontend.'], function () {
  // Home Page
  Route::get('/', [HomePageController::class, 'home'])->name('home');

    // Test Page
    Route::get('/test', [FrontendController::class, 'test'])->name('test');

    // Singel Product
    Route::get('/singel-product', [FrontendController::class, 'singel_product'])->name('singel_product');
    //   Store location
    Route::get('/store-location', [FrontendController::class, 'store_location'])->name('store_location');


    Route::get('/set-locale', [MultiLanguageController::class,'setLocale'])->name('langSwitch');



});


