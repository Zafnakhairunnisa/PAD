<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\Kejaksaan\KejaksaanController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/kejaksaan',
    'as' => 'cluster_5.kejaksaan.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [KejaksaanController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Kejaksaan DIY'),
                    route('frontend.cluster_5.kejaksaan.index')
                );
        });
});
