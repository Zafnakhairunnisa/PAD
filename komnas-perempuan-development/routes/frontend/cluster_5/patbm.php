<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\Patbm\PatbmController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/patbm',
    'as' => 'cluster_5.patbm.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [PatbmController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Perlindungan Terhadap Anak Berbasis Masyarakat (PATBM)'),
                    route('frontend.cluster_5.patbm.index')
                );
        });
});
