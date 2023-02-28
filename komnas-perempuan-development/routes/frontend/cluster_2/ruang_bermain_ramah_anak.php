<?php

use App\Domains\Institutional\Http\Controllers\Frontend\RuangBermainRamahAnak\RuangBermainRamahAnakController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_2.ruang_bermain_ramah_anak'.
Route::group([
    'prefix' => 'klaster-ii/ruang-bermain-ramah-anak',
    'as' => 'cluster_2.ruang_bermain_ramah_anak.',
], function () {
    // All route names are prefixed with 'frontend.cluster_2.ruang_bermain_ramah_anak'.
    Route::get('/', [RuangBermainRamahAnakController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster II'))
                ->push(
                    __('Ruang Bermain Ramah Anak'),
                    route('frontend.cluster_2.ruang_bermain_ramah_anak.index')
                );
        });
    Route::get('/{slug}/dokumen', [RuangBermainRamahAnakController::class, 'document'])
        ->name('document')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.ruang_bermain_ramah_anak.index')
                ->push(__('Data Dokumen'));
        });
    Route::get('/{slug}/foto', [RuangBermainRamahAnakController::class, 'image'])
        ->name('image')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.ruang_bermain_ramah_anak.index')
                ->push(__('Data Foto'));
        });
});
