<?php

use App\Http\Controllers\Backend\Admin\Setup\BrandController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Backend\Admin\AuditController;
use App\Http\Controllers\Backend\Admin\TempFileController;
use App\Http\Controllers\Backend\Admin\SiteSettingController;
use App\Http\Controllers\Backend\Admin\DocumentationController;
use App\Http\Controllers\Backend\Admin\UserManagement\UserController;
use App\Http\Controllers\Backend\Admin\AdminManagement\RoleController;
use App\Http\Controllers\Backend\Admin\AdminManagement\AdminController;
use App\Http\Controllers\Backend\Admin\SellerManagement\SellerController;
use App\Http\Controllers\Backend\Admin\AdminManagement\PermissionController;
use App\Http\Controllers\Backend\Admin\ProductManagement\CategoryController;
use App\Http\Controllers\Backend\Admin\ProductManagement\SubCategoryController;
use App\Http\Controllers\Backend\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Backend\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Backend\Admin\Setup\CountryController;

// Admin Auth Routes
Route::controller(AdminLoginController::class)->prefix('admin')->name('admin.')->group(function () {
  Route::get('/login', 'showLoginForm')->name('login'); // Admin Login Form
  Route::post('/login', 'login')->name('login.submit'); // Admin Login Submit (Handled by AuthenticatesUsers)
  Route::post('/logout', 'logout')->name('logout'); // Admin Logout
});



Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {

  Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');
  //Developer Routes
  Route::get('/export-permissions', function () {
    $filename = 'permissions.csv';
    $filePath = createCSV($filename);
    return Response::download($filePath, $filename);
  })->name('permissions.export');


  // Admin Management
  Route::group(['as' => 'am.', 'prefix' => 'admin-management'], function () {
    Route::resource('admin', AdminController::class);
    Route::get('admin/status/{admin}', [AdminController::class, 'status'])->name('admin.status');
    Route::resource('role', RoleController::class);
    Route::get('role/status/{role}', [RoleController::class, 'status'])->name('role.status');
    Route::resource('permission', PermissionController::class);
    Route::get('permission/status/{permission}', [PermissionController::class, 'status'])->name('permission.status');
  });

     // User Management
     Route::group(['as' => 'um.', 'prefix' => 'user-management'], function () {
        Route::resource('user', UserController::class);
        Route::get('user/status/{user}', [UserController::class, 'status'])->name('user.status');
    });

    // Seller Management
    Route::group(['as' => 'sl.', 'prefix' => 'seller-management'], function () {
        Route::resource('seller', SellerController::class);
        Route::get('seller/status/{seller}', [SellerController::class, 'status'])->name('seller.status');
    });

     // Setup Country
     Route::group(['as' => 'setup.', 'prefix' => 'country-management'], function () {
        Route::resource('country', CountryController::class);
        Route::get('country/status/{country}', [CountryController::class, 'status'])->name('country.status');

        Route::resource('brand', BrandController::class);
        Route::get('brand/status/{brand}', [BrandController::class, 'status'])->name('brand.status');
        Route::get('brand/feature/{brand}', [BrandController::class, 'feature'])->name('brand.feature');
    });

    // Product Management
    Route::group(['as' => 'pm.', 'prefix' => 'product-management'], function () {
        // Category Routes
        Route::resource('category', CategoryController::class);
        Route::get('category/status/{category}', [CategoryController::class, 'status'])->name('category.status');
        Route::get('category/feature/{category}', [CategoryController::class, 'feature'])->name('category.feature');
        // Sub Category Routes
        Route::resource('sub-category', SubCategoryController::class);
        Route::get('sub-category/status/{sub_category}', [SubCategoryController::class, 'status'])->name('sub-category.status');
        Route::get('sub-category/feature/{sub_category}', [SubCategoryController::class, 'feature'])->name('sub-category.feature');
    });

  // Documentation
  Route::resource('documentation', DocumentationController::class);

  // Audit Management
  Route::controller(AuditController::class)->prefix('audits')->name('audit.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('details/{id}', 'details')->name('details');
  });
  // Temp File
  Route::controller(TempFileController::class)->prefix('temp-files')->name('temp.')->group(function () {
    Route::get('index', 'index')->name('index');
    Route::get('download/{path}', 'download')->name('download');
    Route::delete('delete/{id}', 'destroy')->name('destroy');
  });

  // Site Settings
  Route::controller(SiteSettingController::class)->prefix('site-settings')->name('site_setting.')->group(function () {
    Route::get('index', 'index')->name('index');
    Route::post('update', 'update')->name('update');
    Route::get('email-template/edit/{id}', 'et_edit')->name('email_template');
    Route::put('email-template/edit/{id}', 'et_update')->name('email_template');
    Route::post('notification/update', 'notification')->name('notification');
  });

});

