<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\PerlindunganKhususAnak\PerlindunganKhususAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/perlindungan-khusus-anak',
    'as' => 'cluster_5.perlindungan_khusus_anak.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [PerlindunganKhususAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Anak Memerlukan Perlindungan Khusus (AMPK)'),
                    route('frontend.cluster_5.perlindungan_khusus_anak.index')
                );
        });
});
