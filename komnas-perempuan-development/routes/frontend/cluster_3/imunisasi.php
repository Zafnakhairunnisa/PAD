<?php

use App\Domains\Cluster3\Http\Controllers\Frontend\Imunisasi\ImunisasiController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.imunisasi'.
Route::group([
    'prefix' => 'klaster-iii/imunisasi',
    'as' => 'cluster_3.imunisasi.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.imunisasi'.
    Route::get('/', [ImunisasiController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster III'))
                ->push(
                    __('Persalinan'),
                    route('frontend.cluster_3.imunisasi.index')
                );
        });
});
