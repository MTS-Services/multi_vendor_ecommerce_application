<?php

use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;


Route::group(['as' => 'frontend.'], function () {


  // Home Page
  Route::get('/', [FrontendController::class, 'home'])->name('home');

  // Test Page
  Route::get('/test', [FrontendController::class, 'test'])->name('test');
});


// Auth Routes
Route::group(['as' => 'auth.', 'prefix' => 'auth'], function () {
  Route::group(['as' => 'user.', 'prefix' => 'user'], function () {
    Route::get('/login', [FrontendAuthController::class, 'userLogin'])->name('login');
    Route::get('/register', [FrontendAuthController::class, 'userRegister'])->name('register');
  });
});
