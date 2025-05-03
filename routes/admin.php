<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Admin\AdminManagement\AdminController;
use App\Http\Controllers\Backend\Admin\AdminManagement\PermissionController;
use App\Http\Controllers\Backend\Admin\AdminManagement\RoleController;
use App\Http\Controllers\Backend\Admin\AuditController;
use App\Http\Controllers\Backend\Admin\DatatableController as AdminDatatableController;
use App\Http\Controllers\Backend\Admin\DocumentationController;
use App\Http\Controllers\Backend\Admin\TempFileController;
use App\Http\Controllers\Backend\Admin\SiteSettingController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Backend\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Backend\Admin\DashboardController as AdminDashboardController;

// Admin Auth Routes
Route::controller(AdminLoginController::class)->prefix('admin')->name('admin.')->group(function () {
  Route::get('/login', 'showLoginForm')->name('login'); // Admin Login Form
  Route::post('/login', 'login')->name('login.submit'); // Admin Login Submit (Handled by AuthenticatesUsers)
  Route::post('/logout', 'logout')->name('logout'); // Admin Logout
});


Route::get('/admin/dashboard', [AdminDashboardController::class, 'dashboard'])->name('admin.dashboard');

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {

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
