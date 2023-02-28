<?php

use App\Domains\Institutional\Http\Controllers\Frontend\LembagaKesejahteraanSosialAnak\LembagaKesejahteraanSosialAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_2.lembaga_kesejahteraan_sosial_anak'.
Route::group([
    'prefix' => 'klaster-ii/lembaga-kesejahteraan-sosial-anak',
    'as' => 'cluster_2.lembaga_kesejahteraan_sosial_anak.',
], function () {
    // All route names are prefixed with 'frontend.cluster_2.lembaga_kesejahteraan_sosial_anak'.
    Route::get('/', [LembagaKesejahteraanSosialAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster II'))
                ->push(
                    __('Lembaga Kesejahteraan Sosial Anak'),
                    route('frontend.cluster_2.lembaga_kesejahteraan_sosial_anak.index')
                );
        });
});
