<?php

use App\Domains\Cluster5\Models\Bapas\BapasRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Bapas\Recapitulation\BapasRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\Bapas\Recapitulation\BapasRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\Bapas\Recapitulation\BapasRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.bapas.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/bapas/rekapitulasi',
    'as' => 'cluster_5.bapas.recapitulation.',
], function () {
    Route::get('/', BapasRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.bapas.recapitulation|admin.cluster_5.bapas.recapitulation.list|admin.cluster_5.bapas.recapitulation.create|admin.cluster_5.bapas.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.bapas.index')
                ->push(
                    __('Rekapitulasi'),
                    route('admin.cluster_5.bapas.recapitulation.index')
                );
        });

    Route::get('create', BapasRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.bapas.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.bapas.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi'),
                    route('admin.cluster_5.bapas.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', BapasRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.bapas.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, BapasRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.bapas.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi'),
                        route('admin.cluster_5.bapas.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
