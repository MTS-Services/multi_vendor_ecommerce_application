<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;


Route::group(['as' => 'frontend.'], function () {


  // Home Page
  Route::get('/', [FrontendController::class, 'home'])->name('home');
});
