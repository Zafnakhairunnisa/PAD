<?php

use App\Domains\Cluster5\Models\Bprs\BprsRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Bprs\Recapitulation\BprsRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\Bprs\Recapitulation\BprsRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\Bprs\Recapitulation\BprsRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.bprs.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/bprs/rekapitulasi',
    'as' => 'cluster_5.bprs.recapitulation.',
], function () {
    Route::get('/', BprsRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.bprs.recapitulation|admin.cluster_5.bprs.recapitulation.list|admin.cluster_5.bprs.recapitulation.create|admin.cluster_5.bprs.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.bprs.index')
                ->push(
                    __('Rekapitulasi'),
                    route('admin.cluster_5.bprs.recapitulation.index')
                );
        });

    Route::get('create', BprsRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.bprs.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.bprs.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi'),
                    route('admin.cluster_5.bprs.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', BprsRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.bprs.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, BprsRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.bprs.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi'),
                        route('admin.cluster_5.bprs.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
