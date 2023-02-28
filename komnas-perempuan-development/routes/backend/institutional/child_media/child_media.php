<?php

use App\Domains\Institutional\Http\Controllers\Backend\ChildMedia\ChildMediaController;
use App\Domains\Institutional\Models\ChildMedia;
use App\Http\Livewire\Backend\Institutional\ChildMedia\ChildMediaImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.institutional'.
Route::group([
    'prefix' => 'kelembagaan/media-massa-sahabat-anak',
    'as' => 'institutional.child_media.',
], function () {
    Route::get('/', [ChildMediaController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.institutional.child_media|admin.institutional.child_media.list|admin.institutional.child_media.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Media Massa Sahabat Anak'), route('admin.institutional.child_media.index'));
        });

    Route::get('create', [ChildMediaController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_media.index')
                ->push(__('Buat Media Massa Sahabat Anak'), route('admin.institutional.child_media.create'));
        });

    Route::get('/import', ChildMediaImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_media.index')
                ->push(__('Impor Media Massa Sahabat Anak'), route('admin.institutional.child_media.import'));
        });
    Route::post('/', [ChildMediaController::class, 'store'])->name('store');

    Route::group(['prefix' => '{childMedia}'], function () {
        Route::get('edit', [ChildMediaController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, ChildMedia $childMedia) {
                $trail->parent('admin.institutional.child_media.index', $childMedia)
                    ->push(__('Ubah Media Massa Sahabat Anak'), route('admin.institutional.child_media.edit', $childMedia));
            });

        Route::patch('/', [ChildMediaController::class, 'update'])->name('update');
        Route::delete('/', [ChildMediaController::class, 'destroy'])->name('destroy');
    });
});
