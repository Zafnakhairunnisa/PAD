<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\KekerasanTerhadapAnak\KekerasanTerhadapAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/kekerasan-terhadap-anak',
    'as' => 'cluster_5.kekerasan_terhadap_anak.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [KekerasanTerhadapAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Angka Kekerasan Terhadap Anak'),
                    route('frontend.cluster_5.kekerasan_terhadap_anak.index')
                );
        });
});
