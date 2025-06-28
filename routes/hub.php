
<?php

use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\EmailVerificationNotificationController as StaffEmailVerificationNotificationController;
use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\EmailVerificationPromptController as StaffEmailVerificationPromptController;
use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\ForgotPasswordController as StaffForgotPasswordController;
use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\LoginController as StaffLoginController;
use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\RegisterController as StaffRegisterController;
use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\ResetPasswordController as StaffResetPasswordController;
use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\VerificationController as StaffVerificationController;
use App\Http\Controllers\Backend\Hub\StaffManagement\Auth\VerifyEmailController;
use App\Http\Controllers\Backend\Hub\StaffManagement\DashboardController as StaffDashboardController;
use App\Http\Controllers\Backend\Hub\StaffManagement\StaffController;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ('auth:staff'),'as' => 'staff.','prefix' => 'staff'],function () {
       Route::get('verify-email', StaffEmailVerificationPromptController::class)
    ->name('verification.notice');
  Route::get('/verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');
  Route::post('/email/verification-notification', [StaffEmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('verification.send');
    Route::get('/verify-email', [StaffVerificationController::class, 'show'])->name('verification.notice');

});
// Admin Auth Routes
Route::group(['prefix' => 'hub'], function () {
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
        Route::group(['middleware' => ['auth:staff', 'staff.verify'], 'as' => 'password.', 'prefix' => 'password'], function () {
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
    Route::group(['middleware' => ['auth:staff', 'staff.verify'], 'prefix' => 'hub'], function () {
        Route::get('/staff/dashboard', [StaffDashboardController::class, 'dashboard'])->name('staff.dashboard');


        Route::group(['as' => 'sm.', 'prefix' => 'staff-management'], function () {
            Route::resource('staff', StaffController::class);
            Route::controller(StaffController::class)->group(function () {
                Route::get('staff/status/{staff}', 'status')->name('staff.status');
                Route::get('staff/recycle/bin', 'recycleBin')->name('staff.recycle-bin');
                Route::get('staff/restore/{staff}', 'restore')->name('staff.restore');
                Route::delete('staff/permanent-delete/{staff}', 'permanentDelete')->name('staff.permanent-delete');
            });
        });
    });
});
