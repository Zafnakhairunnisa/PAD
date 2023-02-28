<?php

use App\Domains\Cluster5\Models\AnakBerhadapanHukum\AnakBerhadapanHukumRecapitulation;
use App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Recapitulation\AnakBerhadapanHukumRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Recapitulation\AnakBerhadapanHukumRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Recapitulation\AnakBerhadapanHukumRecapitulationUpdateForm;
use App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\AnakBerhadapanHukumImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.anak_berhadapan_hukum.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/anak-berhadapan-dengan-hukum/rekapitulasi',
    'as' => 'cluster_5.anak_berhadapan_hukum.recapitulation.',
], function () {
    Route::get('/', AnakBerhadapanHukumRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.anak_berhadapan_hukum.recapitulation|admin.cluster_5.anak_berhadapan_hukum.recapitulation.list|admin.cluster_5.anak_berhadapan_hukum.recapitulation.create|admin.cluster_5.anak_berhadapan_hukum.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push('Klaster V')
                ->push('Anak Berhadapan dengan Hukum')
                ->push(
                    __('Rekapitulasi Anak Berhadapan dengan Hukum'),
                    route('admin.cluster_5.anak_berhadapan_hukum.recapitulation.index')
                );
        });

    Route::get('import', AnakBerhadapanHukumImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.anak_berhadapan_hukum.recapitulation.index')
                ->push(__('Impor Anak Berhadapan Hukum'), route('admin.cluster_5.anak_berhadapan_hukum.recapitulation.import'));
        });

    Route::get('create', AnakBerhadapanHukumRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.anak_berhadapan_hukum.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.anak_berhadapan_hukum.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi Anak Berhadapan dengan Hukum'),
                    route('admin.cluster_5.anak_berhadapan_hukum.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', AnakBerhadapanHukumRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.anak_berhadapan_hukum.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, AnakBerhadapanHukumRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.anak_berhadapan_hukum.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi Anak Berhadapan dengan Hukum'),
                        route('admin.cluster_5.anak_berhadapan_hukum.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
