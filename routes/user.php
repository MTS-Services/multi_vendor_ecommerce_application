<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\User\DashboardController as UserDashboardController;


Auth::routes();

Route::middleware(['auth:web'])->group(function () {
  Route::get('/profile', [UserDashboardController::class, 'profile'])->name('user.profile');
});
