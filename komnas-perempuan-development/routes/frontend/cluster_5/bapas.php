<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\Bapas\BapasController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/bapas',
    'as' => 'cluster_5.bapas.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [BapasController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Balai Pemasyarakatan DIY'),
                    route('frontend.cluster_5.bapas.index')
                );
        });
});
