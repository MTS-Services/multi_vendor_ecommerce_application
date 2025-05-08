<?php

use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;


Route::group(['as' => 'frontend.'], function () {


  // Home Page
  Route::get('/', [FrontendController::class, 'home'])->name('home');

  // Test Page
  Route::get('/test', [FrontendController::class, 'test'])->name('test');

// Singel Product
  Route::get('/singel-product', [FrontendController::class, 'singel_product'])->name('singel_product');
});


Route::get('/t', [FrontendAuthController::class, 't'])->name('t');