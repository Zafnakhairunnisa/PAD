<?php

use App\Domains\Institutional\Http\Controllers\Frontend\PerkawinanAnak\PerkawinanAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_2.perkawinan_anak'.
Route::group([
    'prefix' => 'klaster-ii/perkawinan-anak',
    'as' => 'cluster_2.perkawinan_anak.',
], function () {
    // All route names are prefixed with 'frontend.cluster_2.perkawinan_anak'.
    Route::get('/', [PerkawinanAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster II'))
                ->push(
                    __('Perkawinan Anak'),
                    route('frontend.cluster_2.perkawinan_anak.index')
                );
        });
});
