<?php

use App\Domains\Cluster3\Http\Controllers\Frontend\AirBersihSanitasi\AirBersihSanitasiController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-iii/air-bersih-dan-sanitasi',
    'as' => 'cluster_3.air_bersih_dan_sanitasi.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [AirBersihSanitasiController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster III'))
                ->push(
                    __('Persalinan'),
                    route('frontend.cluster_3.air_bersih_dan_sanitasi.index')
                );
        });
});
