<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\AnakAids\AnakAidsController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/anak-aids',
    'as' => 'cluster_5.anak_aids.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [AnakAidsController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Anak dengan HIV/AIDS (ADHA)'),
                    route('frontend.cluster_5.anak_aids.index')
                );
        });
});
