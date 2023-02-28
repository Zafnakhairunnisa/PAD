<?php

use App\Domains\Institutional\Http\Controllers\Frontend\LembagaKonsultasiKeluarga\LembagaKonsultasiKeluargaController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_2.lembaga_konsultasi_keluarga'.
Route::group([
    'prefix' => 'klaster-ii/lembaga-konsultasi-keluarga',
    'as' => 'cluster_2.lembaga_konsultasi_keluarga.',
], function () {
    // All route names are prefixed with 'frontend.cluster_2.lembaga_konsultasi_keluarga'.
    Route::get('/', [LembagaKonsultasiKeluargaController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster II'))
                ->push(
                    __('Lembaga Konsultasi Keluarga'),
                    route('frontend.cluster_2.lembaga_konsultasi_keluarga.index')
                );
        });
    Route::get('/{slug}/dokumen', [LembagaKonsultasiKeluargaController::class, 'document'])
        ->name('document')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.lembaga_konsultasi_keluarga.index')
                ->push(__('Data Dokumen'));
        });
    Route::get('/{slug}/foto', [LembagaKonsultasiKeluargaController::class, 'image'])
        ->name('image')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.lembaga_konsultasi_keluarga.index')
                ->push(__('Data Foto'));
        });
});
