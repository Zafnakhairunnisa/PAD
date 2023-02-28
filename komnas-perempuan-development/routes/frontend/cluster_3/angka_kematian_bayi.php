<?php

use App\Domains\Cluster3\Http\Controllers\Frontend\AngkaKematianBayi\AngkaKematianBayiController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.angka_kematian_bayi'.
Route::group([
    'prefix' => 'klaster-iii/angka-kematian-bayi',
    'as' => 'cluster_3.angka_kematian_bayi.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.angka_kematian_bayi'.
    Route::get('/', [AngkaKematianBayiController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster III'))
                ->push(
                    __('Persalinan'),
                    route('frontend.cluster_3.angka_kematian_bayi.index')
                );
        });
});
