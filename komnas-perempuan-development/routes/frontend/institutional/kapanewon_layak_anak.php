<?php

use App\Domains\Institutional\Http\Controllers\Frontend\KapanewonLayakAnak\KapanewonLayakAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.institutional.kapanewon_layak_anak'.
Route::group([
    'prefix' => 'kelembagaan/kapanewon-layak-anak',
    'as' => 'institutional.kapanewon_layak_anak.',
], function () {
    // All route names are prefixed with 'frontend.institutional.kapanewon_layak_anak'.
    Route::get('/', [KapanewonLayakAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Kelembagaan'))
                ->push(__('Kapanewon Layak Anak'), route('frontend.institutional.kapanewon_layak_anak.index'));
        });
    Route::get('/{slug}/dokumen', [KapanewonLayakAnakController::class, 'document'])
        ->name('document')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.kapanewon_layak_anak.index')
                ->push(__('Data Dokumen'));
        });
    Route::get('/{slug}/foto', [KapanewonLayakAnakController::class, 'image'])
        ->name('image')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.kapanewon_layak_anak.index')
                ->push(__('Data Foto'));
        });
});
