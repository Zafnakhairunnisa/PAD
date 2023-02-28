<?php

use App\Domains\Cluster3\Http\Controllers\Frontend\KartuIbuAnak\KartuIbuAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.kartu_ibu_anak'.
Route::group([
    'prefix' => 'klaster-iii/kartu-ibu-anak',
    'as' => 'cluster_3.kartu_ibu_anak.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.kartu_ibu_anak'.
    Route::get('/', [KartuIbuAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster III'))
                ->push(
                    __('Kartu Ibu Anak'),
                    route('frontend.cluster_3.kartu_ibu_anak.index')
                );
        });
});
