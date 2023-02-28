<?php

use App\Domains\Cluster3\Http\Controllers\Frontend\PemberianAirSusuIbu\PemberianAirSusuIbuController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.pemberian_air_susu_ibu'.
Route::group([
    'prefix' => 'klaster-iii/pemberian-air-susu-ibu',
    'as' => 'cluster_3.pemberian_air_susu_ibu.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.pemberian_air_susu_ibu'.
    Route::get('/', [PemberianAirSusuIbuController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster III'))
                ->push(
                    __('Kartu Ibu Anak'),
                    route('frontend.cluster_3.pemberian_air_susu_ibu.index')
                );
        });
});
