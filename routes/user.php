<?php

use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\User\DashboardController as UserDashboardController;

Auth::routes([
  'verify' => true
]);

Route::middleware('auth:web')->group(function () {
  Route::get('verify-email', EmailVerificationPromptController::class)
    ->name('verification.notice');
  Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');
  Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
    ->middleware('throttle:6,1')
    ->name('verification.send');
});

Route::group(['middleware' => ['auth:web', 'verified'], 'as' => 'user.', 'prefix' => 'user'], function () {

  Route::get('/profile', [UserDashboardController::class, 'profile'])->name('profile');

  Route::get('/my-profile', [UserDashboardController::class, 'myProfile'])->name('my-profile');

  Route::get('/address', [UserDashboardController::class, 'address'])->name('address');

});
