<?php

use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;


Route::group(['as' => 'frontend.'], function () {


  // Home Page
  Route::get('/', [FrontendController::class, 'home'])->name('home');

  // Test Page
  Route::get('/test', [FrontendController::class, 'test'])->name('test');
  // Test Page
  Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
  // Test Page
  Route::get('/profile', [FrontendController::class, 'profile'])->name('profile');
  // Test Page
  Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
});


Route::get('/t', [FrontendAuthController::class, 't'])->name('t');