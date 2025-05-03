<?php


use App\Http\Controllers\Backend\DatatableController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Backend\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Backend\Admin\DashboardController;
use App\Http\Controllers\Backend\Admin\AdminManagement\AdminController;
use App\Http\Controllers\Backend\Admin\AdminManagement\PermissionController;
use App\Http\Controllers\Backend\Admin\AdminManagement\RoleController;
use App\Http\Controllers\Backend\Admin\AuditController;
use App\Http\Controllers\Backend\Admin\DatatableController as AdminDatatableController;
use App\Http\Controllers\Backend\Admin\DocumentationController;
use App\Http\Controllers\Backend\FileManagementController;
use App\Http\Controllers\Backend\Admin\TempFileController;
use App\Http\Controllers\Backend\Admin\SiteSettingController;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('update/sort/order', [DatatableController::class, 'updateSortOrder'])->name('update.sort.order');
// File Management
Route::controller(FileManagementController::class)->prefix('file-management')->name('file.')->group(function () {
    Route::post('/upload-temp-file', 'uploadTempFile')->name('upload_tf');
    Route::delete('/delete-temp-file', 'deleteTempFile')->name('delete_tf');
    Route::post('/reset-file-file', 'resetTempFile')->name('reset_tf');
    // Route::post('/cleanup-temp-files', 'cleanupTempFiles')->name('cleanup_tf');
    Route::post('/delete-unsaved-temp-files', 'deleteUnsavedTempFiles')->name('du_tf');
    Route::post('/content-image/upload', 'content_image_upload')->name('ci_upload');
});

Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin'], function () {

    //Developer Routes
    Route::get('/export-permissions', function () {
        $filename = 'permissions.csv';
        $filePath = createCSV($filename);
        return Response::download($filePath, $filename);
    })->name('permissions.export');


    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');


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

require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';
require __DIR__ . '/seller.php';
require __DIR__ . '/frontend.php';
