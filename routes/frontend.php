<?php


use App\Http\Controllers\Frontend\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\MultiLanguageController;

Route::group(['as' => 'frontend.'], function () {
  // Home Page
  Route::get('/', [HomePageController::class, 'home'])->name('home');

  Route::get('/set-locale', [MultiLanguageController::class, 'setLocale'])->name('langSwitch');

  // Test Page
  Route::get('/test', [FrontendController::class, 'test'])->name('test');
  // Test Page
  Route::get('/checkout', [FrontendController::class, 'checkout'])->name('checkout');
  // Test Page
  Route::get('/profile', [FrontendController::class, 'profile'])->name('profile');
  // Test Page
  Route::get('/faq', [FrontendController::class, 'faq'])->name('faq');
  //Shop Page
  Route::get('/shop', [FrontendController::class, 'shop'])->name('shop');
  //Wishlist Page
  Route::get('/wishlist', [FrontendController::class, 'wishlist'])->name('whishlist');
  //Cart Page
  Route::get('/cart', [FrontendController::class, 'cart'])->name('cart');

  // Singel Product
  Route::get('/singel-product', [FrontendController::class, 'singel_product'])->name('singel_product');
  //   Store location
  Route::get('/store-location', [FrontendController::class, 'store_location'])->name('store_location');

   // web.php or a route file
    Route::get('/lang/change/{lang}', [MultiLanguageController::class, 'change'])->name('lang.change');
});
