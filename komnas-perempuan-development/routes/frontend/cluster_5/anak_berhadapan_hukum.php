<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\AnakBerhadapanHukum\AnakBerhadapanHukumController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/anak-berhadapan-hukum',
    'as' => 'cluster_5.anak_berhadapan_hukum.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [AnakBerhadapanHukumController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Anak Berhadapan dengan Hukum (ABH)'),
                    route('frontend.cluster_5.anak_berhadapan_hukum.index')
                );
        });
});
