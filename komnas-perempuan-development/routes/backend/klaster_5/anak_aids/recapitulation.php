<?php

use App\Domains\Cluster5\Models\AnakAids\AnakAidsRecapitulation;
use App\Http\Livewire\Backend\Cluster5\AnakAids\Recapitulation\AnakAidsRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\AnakAids\Recapitulation\AnakAidsRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\AnakAids\Recapitulation\AnakAidsRecapitulationUpdateForm;
use App\Http\Livewire\Backend\Cluster5\AnakAids\AnakAidsImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.anak_aids.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/anak-aids/rekapitulasi',
    'as' => 'cluster_5.anak_aids.recapitulation.',
], function () {
    Route::get('/', AnakAidsRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.anak_aids.recapitulation|admin.cluster_5.anak_aids.recapitulation.list|admin.cluster_5.anak_aids.recapitulation.create|admin.cluster_5.anak_aids.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push('Klaster V')
                ->push('AIDS')
                ->push(
                    __('Rekapitulasi AIDS'),
                    route('admin.cluster_5.anak_aids.recapitulation.index')
                );
        });

    Route::get('import', AnakAidsImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.anak_aids.recapitulation.index')
                ->push(__('Impor Anak Aids'), route('admin.cluster_5.anak_aids.recapitulation.import'));
        });

    Route::get('create', AnakAidsRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.anak_aids.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.anak_aids.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi AIDS'),
                    route('admin.cluster_5.anak_aids.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', AnakAidsRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.anak_aids.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, AnakAidsRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.anak_aids.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi AIDS'),
                        route('admin.cluster_5.anak_aids.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
