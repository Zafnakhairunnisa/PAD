<?php

use App\Domains\Institutional\Http\Controllers\Backend\SatgasPPA\SatgasPPARecapitulationController;
use App\Domains\Institutional\Models\SatgasPPARecapitulation;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.satgas_ppa.recapitulation.'.
Route::group([
    'prefix' => 'kelembagaan/satgas-ppa/rekapitulasi',
    'as' => 'institutional.satgas_ppa.recapitulation.',
], function () {
    Route::get('/', [SatgasPPARecapitulationController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.institutional.satgas_ppa.recapitulation|admin.institutional.satgas_ppa.recapitulation.list|admin.institutional.satgas_ppa.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Satgas PPA'), route('admin.institutional.satgas_ppa.index'))
                ->push(__('Rekapitulasi'), route('admin.institutional.satgas_ppa.recapitulation.index'));
        });

    Route::get('create', [SatgasPPARecapitulationController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.satgas_ppa.recapitulation.index')
                ->push(__('Buat Rekapitulasi Satgas PPA'), route('admin.institutional.satgas_ppa.recapitulation.create'));
        });
    Route::post('/', [SatgasPPARecapitulationController::class, 'store'])->name('store');

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', [SatgasPPARecapitulationController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, SatgasPPARecapitulation $recapitulation) {
                $trail->parent('admin.institutional.satgas_ppa.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Satgas PPA'), route('admin.institutional.satgas_ppa.recapitulation.edit', $recapitulation));
            });

        Route::patch('/', [SatgasPPARecapitulationController::class, 'update'])->name('update');
        Route::delete('/', [SatgasPPARecapitulationController::class, 'destroy'])->name('destroy');
    });
});
