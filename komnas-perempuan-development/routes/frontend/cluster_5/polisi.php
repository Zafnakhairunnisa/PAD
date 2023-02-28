<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\Polisi\PolisiController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/polisi',
    'as' => 'cluster_5.polisi.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [PolisiController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Polisi DIY'),
                    route('frontend.cluster_5.polisi.index')
                );
        });
});
