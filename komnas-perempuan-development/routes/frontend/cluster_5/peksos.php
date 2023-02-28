<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\Peksos\PeksosController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/peksos',
    'as' => 'cluster_5.peksos.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [PeksosController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Pekerjaan Sosial (Peksos)'),
                    route('frontend.cluster_5.peksos.index')
                );
        });
});
