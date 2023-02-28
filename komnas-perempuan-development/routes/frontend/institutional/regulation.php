<?php

use App\Domains\Institutional\Http\Controllers\Frontend\Regulation\RegulationController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.institutional'.
Route::group([
    'prefix' => 'kelembagaan/peraturan-dan-kebijakan',
    'as' => 'institutional.regulation.',
], function () {
    // All route names are prefixed with 'frontend.institutional.regulation'.
    Route::get('/', [RegulationController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Kelembagaan'))
                ->push(__('Peraturan dan Kebijakan'), route('frontend.institutional.regulation.index'));
        });
    Route::get('/{slug}/dokumen', [RegulationController::class, 'document'])
        ->name('document')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.regulation.index')
                ->push(__('Data Dokumen'));
        });
    Route::get('/{slug}/foto', [RegulationController::class, 'image'])
        ->name('image')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.regulation.index')
                ->push(__('Data Foto'));
        });
});
