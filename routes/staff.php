
<?php

use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\ForgotPasswordController as StaffForgotPasswordController;
use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\LoginController as StaffLoginController;
use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\RegisterController as StaffRegisterController;
use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\ResetPasswordController as StaffResetPasswordController;
use App\Http\Controllers\Backend\Hub\StaffManagement\DashboardController as StaffDashboardController;
use Illuminate\Support\Facades\Route;

// Admin Auth Routes
Route::group(['as' => 'staff.', 'prefix' => 'staff'], function () {
    Route::controller(StaffLoginController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('login'); // Admin Login Form
        Route::post('/login', 'login')->name('login.submit'); // Admin Login Submit (Handled by AuthenticatesUsers)
        Route::post('/logout', 'logout')->middleware('auth:staff')->name('logout'); // Admin Logout
    });

    Route::controller(StaffRegisterController::class)->group(function () {
        Route::get('/register', 'showRegistrationForm')->name('register'); // Seller Register Form
        Route::post('/register', 'register')->name('register.submit'); // Seller Register Submit
    });
    Route::group(['as' => 'password.', 'prefix' => 'password'], function () {
        // Admin Forgot Password
        Route::controller(StaffForgotPasswordController::class)->group(function () {
            Route::get('/forgot', 'showLinkRequestForm')->name('forgot');
            Route::post('/forgot/request', 'sendResetLinkEmail')->name('forgot.request');
        });
        // Admin Password Reset
        Route::controller(StaffResetPasswordController::class)->group(function () {
            Route::get('/reset/{token}', 'showResetForm')->name('reset');
            Route::post('/reset', 'reset')->name('reset.request');
        });
    });
});
Route::group(['middleware' => 'auth:staff', 'prefix' => 'staff'], function () {
    Route::get('/dashboard', [StaffDashboardController::class, 'dashboard'])->name('staff.dashboard');
});
