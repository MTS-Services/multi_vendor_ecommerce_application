<?php


use App\Http\Controllers\Backend\DatatableController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\Backend\FileManagementController;
use App\Http\Controllers\Frontend\MultiLanguageController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

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

//language


    // web.php or a route file
    // Route::get('/lang/change/{lang}', [MultiLanguageController::class, 'change'])->name('lang.change');
    Route::get('/greeting/{locale}', function (string $locale) {
        if (!in_array($locale, ['en', 'bn', 'fr'])) {
            abort(400);
        }
        App::setLocale($locale);
        Session::put('locale', $locale);
        Session::save(); 
        return redirect()->back();
    })->name('locale.change');

require __DIR__ . '/admin.php';
require __DIR__ . '/user.php';
require __DIR__ . '/seller.php';
require __DIR__ . '/frontend.php';
