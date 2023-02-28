<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\Pengadilan\PengadilanController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/pengadilan',
    'as' => 'cluster_5.pengadilan.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [PengadilanController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Pengadilan DIY'),
                    route('frontend.cluster_5.pengadilan.index')
                );
        });
});
