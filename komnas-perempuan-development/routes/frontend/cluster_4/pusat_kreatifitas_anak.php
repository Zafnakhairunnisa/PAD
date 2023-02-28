<?php

use App\Domains\Cluster4\Http\Controllers\Frontend\PusatKreatifitasAnak\PusatKreatifitasAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_4.pusat_kreatifitas_anak'.
Route::group([
    'prefix' => 'klaster-iv/pusat-kreatifitas-anak',
    'as' => 'cluster_4.pusat_kreatifitas_anak.',
], function () {
    // All route names are prefixed with 'frontend.cluster_4.pusat_kreatifitas_anak'.
    Route::get('/', [PusatKreatifitasAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster IV'))
                ->push(
                    __('Persalinan'),
                    route('frontend.cluster_4.pusat_kreatifitas_anak.index')
                );
        });
});
