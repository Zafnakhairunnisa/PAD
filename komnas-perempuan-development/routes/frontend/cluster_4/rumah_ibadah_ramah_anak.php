<?php

use App\Domains\Cluster4\Http\Controllers\Frontend\RumahIbadahRamahAnak\RumahIbadahRamahAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_4.rumah_ibadah_ramah_anak'.
Route::group([
    'prefix' => 'klaster-iv/rumah-ibadah-ramah-anak',
    'as' => 'cluster_4.rumah_ibadah_ramah_anak.',
], function () {
    // All route names are prefixed with 'frontend.cluster_4.rumah_ibadah_ramah_anak'.
    Route::get('/', [RumahIbadahRamahAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster IV'))
                ->push(
                    __('Persalinan'),
                    route('frontend.cluster_4.rumah_ibadah_ramah_anak.index')
                );
        });
});
