<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\Auth\LoginController as AdminLoginController;

// Admin Auth Routes
Route::controller(AdminLoginController::class)->prefix('admin')->name('admin.')->group(function () {
  Route::get('/login', 'showLoginForm')->name('login'); // Admin Login Form
  Route::post('/login', 'login')->name('login.submit'); // Admin Login Submit (Handled by AuthenticatesUsers)
  Route::post('/logout', 'logout')->name('logout'); // Admin Logout
});