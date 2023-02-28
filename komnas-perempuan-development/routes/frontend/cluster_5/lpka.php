<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\Lpka\LpkaController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/lpka',
    'as' => 'cluster_5.lpka.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [LpkaController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Lembaga Pembinaan Khusus Anak Yogyakarta'),
                    route('frontend.cluster_5.lpka.index')
                );
        });
});
