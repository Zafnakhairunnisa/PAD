<?php

use App\Domains\Institutional\Http\Controllers\Backend\ChildMedia\ChildMediaRecapitulationController;
use App\Domains\Institutional\Models\ChildMediaRecapitulation;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.child_media.recapitulation.'.
Route::group([
    'prefix' => 'kelembagaan/media-massa-sahabat-anak/rekapitulasi',
    'as' => 'institutional.child_media.recapitulation.',
], function () {
    Route::get('/', [ChildMediaRecapitulationController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.institutional.child_media.recapitulation|admin.institutional.child_media.recapitulation.list|admin.institutional.child_media.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Media Massa Sahabat Anak'), route('admin.institutional.child_media.index'))
                ->push(__('Rekapitulasi'), route('admin.institutional.child_media.recapitulation.index'));
        });

    Route::get('create', [ChildMediaRecapitulationController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_media.recapitulation.index')
                ->push(__('Buat Rekapitulasi Media Massa Sahabat Anak'), route('admin.institutional.child_media.recapitulation.create'));
        });
    Route::post('/', [ChildMediaRecapitulationController::class, 'store'])->name('store');

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', [ChildMediaRecapitulationController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, ChildMediaRecapitulation $recapitulation) {
                $trail->parent('admin.institutional.child_media.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Media Massa Sahabat Anak'), route('admin.institutional.child_media.recapitulation.edit', $recapitulation));
            });

        Route::patch('/', [ChildMediaRecapitulationController::class, 'update'])->name('update');
        Route::delete('/', [ChildMediaRecapitulationController::class, 'destroy'])->name('destroy');
    });
});
