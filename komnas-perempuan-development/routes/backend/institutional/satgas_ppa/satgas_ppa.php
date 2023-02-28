<?php

use App\Domains\Institutional\Http\Controllers\Backend\SatgasPPA\SatgasPPAController;
use App\Domains\Institutional\Models\SatgasPPA;
use App\Http\Livewire\Backend\Institutional\Satgas\SatgasImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.institutional'.
Route::group([
    'prefix' => 'kelembagaan/satgas-ppa',
    'as' => 'institutional.satgas_ppa.',
], function () {
    Route::get('/', [SatgasPPAController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.institutional.satgas_ppa|admin.institutional.satgas_ppa.list|admin.institutional.satgas_ppa.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Satgas PPA'), route('admin.institutional.satgas_ppa.index'));
        });

    Route::get('create', [SatgasPPAController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.satgas_ppa.index')
                ->push(__('Buat Satgas PPA'), route('admin.institutional.satgas_ppa.create'));
        });

    Route::get('/import', SatgasImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.satgas_ppa.index')
                ->push(__('Impor Satgas PPA'), route('admin.institutional.satgas_ppa.import'));
        });
    Route::post('/', [SatgasPPAController::class, 'store'])->name('store');

    Route::group(['prefix' => '{satgas}'], function () {
        Route::get('edit', [SatgasPPAController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, SatgasPPA $satgas) {
                $trail->parent('admin.institutional.satgas_ppa.index', $satgas)
                    ->push(__('Ubah Satgas PPA'), route('admin.institutional.satgas_ppa.edit', $satgas));
            });

        Route::patch('/', [SatgasPPAController::class, 'update'])->name('update');
        Route::delete('/', [SatgasPPAController::class, 'destroy'])->name('destroy');
    });
});
