<?php

// All route names are prefixed with 'admin.file'.
use App\Http\Controllers\Backend\FileController;

Route::group([
    'prefix' => 'file',
    'as' => 'file.',
], function () {
    Route::get('/{file}', [FileController::class, 'show'])->name('show');
    Route::delete('/{file}', [FileController::class, 'destroy'])->name('destroy');
});
