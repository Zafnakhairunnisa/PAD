<?php

use App\Domains\Cluster3\Http\Controllers\Frontend\AngkaKematianIbuMelahirkan\AngkaKematianIbuMelahirkanController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.angka_kematian_ibu_melahirkan'.
Route::group([
    'prefix' => 'klaster-iii/angka-kematian-ibu-melahirkan',
    'as' => 'cluster_3.angka_kematian_ibu_melahirkan.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.angka_kematian_ibu_melahirkan'.
    Route::get('/', [AngkaKematianIbuMelahirkanController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster III'))
                ->push(
                    __('Persalinan'),
                    route('frontend.cluster_3.angka_kematian_ibu_melahirkan.index')
                );
        });
});
