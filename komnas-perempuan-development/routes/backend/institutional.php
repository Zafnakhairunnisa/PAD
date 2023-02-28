<?php

use App\Domains\Institutional\Http\Controllers\Backend\Regulation\RegulationController;
use App\Domains\Institutional\Http\Controllers\Backend\Regulation\RegulationImportController;
use App\Domains\Institutional\Http\Controllers\Backend\Regulation\RegulationRecapitulationController;
use App\Domains\Institutional\Models\Regulation;
use App\Domains\Institutional\Models\RegulationRecapitulation;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.institutional'.
Route::group([
    'prefix' => 'institutional',
    'as' => 'institutional.',
], function () {
    // All route names are prefixed with 'admin.institutional.regulation'.
    Route::group([
        'prefix' => 'regulation',
        'as' => 'regulation.',
    ], function () {
        // All route names are prefixed with 'admin.institutional.regulation.recapitulation'.
        Route::group([
            'prefix' => 'recapitulation',
            'as' => 'recapitulation.',
        ], function () {
            Route::get('/', [RegulationRecapitulationController::class, 'index'])
                ->name('index')
                ->middleware('permission:admin.institutional.regulation.recapitulation|admin.institutional.regulation.recapitulation.list|admin.institutional.regulation.recapitulation.delete')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.dashboard')
                        ->push(__('Kelembagaan'))
                        ->push(__('Peraturan dan Kebijakan'))
                        ->push(__('Rekapitulasi'), route('admin.institutional.regulation.recapitulation.index'));
                });

            Route::get('create', [RegulationRecapitulationController::class, 'create'])
                ->name('create')
                ->breadcrumbs(function (Trail $trail) {
                    $trail->parent('admin.institutional.regulation.index')
                        ->push(__('Buat Rekapitulasi Peraturan dan Kebijakan'), route('admin.institutional.regulation.recapitulation.create'));
                });

            Route::group(['prefix' => '{recapitulation}'], function () {
                Route::get('edit', [RegulationRecapitulationController::class, 'edit'])
                    ->name('edit')
                    ->breadcrumbs(function (Trail $trail, RegulationRecapitulation $recapitulation) {
                        $trail->parent('admin.institutional.regulation.index', $recapitulation)
                            ->push(__('Ubah Rekapitulasi Peraturan dan Kebijakan'), route('admin.institutional.regulation.recapitulation.edit', $recapitulation));
                    });

                Route::delete('/', [RegulationRecapitulationController::class, 'destroy'])->name('destroy');
            });
        });

        // All route names are prefixed with 'admin.institutional.regulation'.
        Route::get('/', [RegulationController::class, 'index'])
            ->name('index')
            ->middleware('permission:admin.institutional.regulation|admin.institutional.regulation.list|admin.institutional.regulation.delete')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Kelembagaan'))
                    ->push(__('Peraturan dan Kebijakan'), route('admin.institutional.regulation.index'));
            });

        Route::get('create', [RegulationController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.institutional.regulation.index')
                    ->push(__('Buat Peraturan dan Kebijakan'), route('admin.institutional.regulation.create'));
            });

        Route::post('/', [RegulationController::class, 'store'])->name('store');
        Route::get('/import', [RegulationImportController::class, 'index'])
            ->name('import')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.institutional.regulation.index')
                    ->push(__('Impor Peraturan dan Kebijakan'), route('admin.institutional.regulation.import'));
            });

        Route::group(['prefix' => '{regulation}'], function () {
            Route::get('edit', [RegulationController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, Regulation $regulation) {
                    $trail->parent('admin.institutional.regulation.index', $regulation)
                        ->push(__('Ubah Peraturan dan Kebijakan'), route('admin.institutional.regulation.edit', $regulation));
                });

            Route::patch('/', [RegulationController::class, 'update'])->name('update');
            Route::delete('/', [RegulationController::class, 'destroy'])->name('destroy');
        });
    });
});
