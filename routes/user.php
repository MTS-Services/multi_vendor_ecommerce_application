<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\User\DashboardController as UserDashboardController;

Auth::routes([
  'verify' => true
]);
Route::group(['middleware' => ['auth:web', 'verified'],'as' => 'user.', 'prefix' => 'user'], function () {

    Route::get('/profile', [UserDashboardController::class, 'profile'])->name('profile');
 
});
