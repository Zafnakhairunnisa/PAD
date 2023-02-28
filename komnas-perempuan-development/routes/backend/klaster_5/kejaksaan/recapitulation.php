<?php

use App\Domains\Cluster5\Models\Kejaksaan\KejaksaanRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Recapitulation\KejaksaanRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Recapitulation\KejaksaanRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\Recapitulation\KejaksaanRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.kejaksaan.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/kejaksaan/rekapitulasi',
    'as' => 'cluster_5.kejaksaan.recapitulation.',
], function () {
    Route::get('/', KejaksaanRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.kejaksaan.recapitulation|admin.cluster_5.kejaksaan.recapitulation.list|admin.cluster_5.kejaksaan.recapitulation.create|admin.cluster_5.kejaksaan.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.kejaksaan.index')
                ->push(
                    __('Rekapitulasi'),
                    route('admin.cluster_5.kejaksaan.recapitulation.index')
                );
        });

    Route::get('create', KejaksaanRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.kejaksaan.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.kejaksaan.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi'),
                    route('admin.cluster_5.kejaksaan.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', KejaksaanRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.kejaksaan.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, KejaksaanRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.kejaksaan.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi'),
                        route('admin.cluster_5.kejaksaan.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
