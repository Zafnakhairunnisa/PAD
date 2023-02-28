<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\Bprs\BprsController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/bprs',
    'as' => 'cluster_5.bprs.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [BprsController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Balai Perlindungan dan Rehabilitasi Sosial Remaja (BPRSR) DIY'),
                    route('frontend.cluster_5.bprs.index')
                );
        });
    Route::get('/{daftar_sop}/dokumen', [BprsController::class, 'document'])
        ->name('document')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.cluster_5.bprs.index')
                ->push(__('Data Dokumen'));
        });
    Route::get('/{daftar_sop}/foto', [BprsController::class, 'image'])
        ->name('image')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.cluster_5.bprs.index')
                ->push(__('Data Foto'));
        });
});
