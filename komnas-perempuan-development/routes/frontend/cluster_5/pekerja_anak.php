<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\PekerjaAnak\PekerjaAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/pekerja-anak',
    'as' => 'cluster_5.pekerja_anak.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [PekerjaAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Pekerja Anak'),
                    route('frontend.cluster_5.pekerja_anak.index')
                );
        });
});
