<?php

use App\Domains\Cluster3\Http\Controllers\Frontend\StatusGiziAnak\StatusGiziAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.status_gizi_anak'.
Route::group([
    'prefix' => 'klaster-iii/status-gizi-anak',
    'as' => 'cluster_3.status_gizi_anak.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.status_gizi_anak'.
    Route::get('/', [StatusGiziAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster III'))
                ->push(
                    __('Status Gizi Anak'),
                    route('frontend.cluster_3.status_gizi_anak.index')
                );
        });
});
