<?php

use App\Domains\Cluster3\Http\Controllers\Frontend\FasilitasKesehatanRamahAnak\FasilitasKesehatanRamahAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.fasilitas_kesehatan_ramah_anak'.
Route::group([
    'prefix' => 'klaster-iii/fasilitas-kesehatan-ramah-anak',
    'as' => 'cluster_3.fasilitas_kesehatan_ramah_anak.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.fasilitas_kesehatan_ramah_anak'.
    Route::get('/', [FasilitasKesehatanRamahAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster III'))
                ->push(
                    __('Fasilitas Kesehatan Ramah Anak'),
                    route('frontend.cluster_3.fasilitas_kesehatan_ramah_anak.index')
                );
        });
});
