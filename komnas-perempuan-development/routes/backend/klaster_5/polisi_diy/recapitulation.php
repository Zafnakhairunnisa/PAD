<?php

use App\Domains\Cluster5\Models\PolisiDiy\PolisiDiyRecapitulation;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Recapitulation\PolisiDiyRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Recapitulation\PolisiDiyRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\Recapitulation\PolisiDiyRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.polisi_diy.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/polisi_diy/rekapitulasi',
    'as' => 'cluster_5.polisi_diy.recapitulation.',
], function () {
    Route::get('/', PolisiDiyRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.polisi_diy.recapitulation|admin.cluster_5.polisi_diy.recapitulation.list|admin.cluster_5.polisi_diy.recapitulation.create|admin.cluster_5.polisi_diy.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.polisi_diy.index')
                ->push(
                    __('Rekapitulasi'),
                    route('admin.cluster_5.polisi_diy.recapitulation.index')
                );
        });

    Route::get('create', PolisiDiyRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.polisi_diy.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.polisi_diy.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi'),
                    route('admin.cluster_5.polisi_diy.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', PolisiDiyRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.polisi_diy.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, PolisiDiyRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.polisi_diy.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi'),
                        route('admin.cluster_5.polisi_diy.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
