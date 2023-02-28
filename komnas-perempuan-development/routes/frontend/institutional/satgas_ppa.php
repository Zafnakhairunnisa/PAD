<?php

use App\Domains\Institutional\Http\Controllers\Frontend\SatgasPPA\SatgasPPAController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.institutional.satgas_ppa'.
Route::group([
    'prefix' => 'kelembagaan/satgas-ppa',
    'as' => 'institutional.satgas_ppa.',
], function () {
    // All route names are prefixed with 'frontend.institutional.satgas_ppa'.
    Route::get('/', [SatgasPPAController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Kelembagaan'))
                ->push(__('Satgas PPA'), route('frontend.institutional.satgas_ppa.index'));
        });
    Route::get('/{slug}/dokumen', [SatgasPPAController::class, 'document'])
        ->name('document')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.satgas_ppa.index')
                ->push(__('Data Dokumen'));
        });
    Route::get('/{slug}/foto', [SatgasPPAController::class, 'image'])
        ->name('image')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.satgas_ppa.index')
                ->push(__('Data Foto'));
        });
});
