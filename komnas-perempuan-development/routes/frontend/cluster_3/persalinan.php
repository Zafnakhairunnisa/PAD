<?php

use App\Domains\Cluster3\Http\Controllers\Frontend\Persalinan\PersalinanController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.persalinan'.
Route::group([
    'prefix' => 'klaster-iii/persalinan',
    'as' => 'cluster_3.persalinan.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.persalinan'.
    Route::get('/', [PersalinanController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster III'))
                ->push(
                    __('Persalinan'),
                    route('frontend.cluster_3.persalinan.index')
                );
        });
});
