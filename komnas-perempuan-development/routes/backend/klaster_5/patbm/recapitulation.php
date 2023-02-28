<?php

use App\Domains\Cluster5\Models\Patbm\PatbmRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Patbm\Recapitulation\PatbmRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\Patbm\Recapitulation\PatbmRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\Patbm\Recapitulation\PatbmRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.patbm.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/patbm/rekapitulasi',
    'as' => 'cluster_5.patbm.recapitulation.',
], function () {
    Route::get('/', PatbmRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.patbm.recapitulation|admin.cluster_5.patbm.recapitulation.list|admin.cluster_5.patbm.recapitulation.create|admin.cluster_5.patbm.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.patbm.index')
                ->push(
                    __('Rekapitulasi'),
                    route('admin.cluster_5.patbm.recapitulation.index')
                );
        });

    Route::get('create', PatbmRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.patbm.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.patbm.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi'),
                    route('admin.cluster_5.patbm.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', PatbmRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.patbm.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, PatbmRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.patbm.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi'),
                        route('admin.cluster_5.patbm.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
