<?php

use App\Domains\Institutional\Http\Controllers\Frontend\KelurahanLayakAnak\KelurahanLayakAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.institutional.kelurahan_layak_anak'.
Route::group([
    'prefix' => 'kelembagaan/kelurahan-layak-anak',
    'as' => 'institutional.kelurahan_layak_anak.',
], function () {
    // All route names are prefixed with 'frontend.institutional.kelurahan_layak_anak'.
    Route::get('/', [KelurahanLayakAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Kelembagaan'))
                ->push(__('Kelurahan Layak Anak'), route('frontend.institutional.kelurahan_layak_anak.index'));
        });
    Route::get('/{slug}/dokumen', [KelurahanLayakAnakController::class, 'document'])
        ->name('document')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.kelurahan_layak_anak.index')
                ->push(__('Data Dokumen'));
        });
    Route::get('/{slug}/foto', [KelurahanLayakAnakController::class, 'image'])
        ->name('image')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.kelurahan_layak_anak.index')
                ->push(__('Data Foto'));
        });
});
