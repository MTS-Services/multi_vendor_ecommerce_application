<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;


Route::group(['as' => 'frontend.'], function () {


  // Home Page
  Route::get('/', [FrontendController::class, 'home'])->name('home');

  // Test Page
  Route::get('/test', [FrontendController::class, 'test'])->name('test');

  //user routes
  Route::get('/register/password', [FrontendController::class, 'index'])->name('register');
  Route::get('/forgot/password', [frontendController::class, 'forgotpassword'])->name('forgot.password');
  Route::get('/reset/password', [frontendController::class, 'resetpassword'])->name('reset.password');
  Route::get('/verify/password', [frontendController::class, 'verifypassword'])->name('verify.password');

  //seller routes
  Route::get('/register/seller', [FrontendController::class, 'registerseller'])->name('frontend.seller.register');
  Route::get('/login/seller', [frontendController::class, 'sellerlogin'])->name('seller.login');
  Route::get('/reset/seller', [frontendController::class, 'sellerrest'])->name('seller.reset');
  Route::get('/verify/seller', [frontendController::class, 'sellerverify'])->name('seller.verify');
  Route::get('/forgot/seller', [frontendController::class, 'sellerforgot'])->name('seller.forgot');

  //admin routes
  Route::get('/login/admin', [frontendController::class, 'adminlogin'])->name('admin.login');
  Route::get('/reset/admin', [frontendController::class, 'adminrest'])->name('admin.reset');
  Route::get('/verify/admin', [frontendController::class, 'adminverify'])->name('admin.verify');
  Route::get('/forgot/admin', [frontendController::class, 'adminforgot'])->name('admin.forgot');

});
