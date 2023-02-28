<?php

use App\Domains\Cluster5\Models\Peksos\PeksosRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Peksos\Recapitulation\PeksosRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\Peksos\Recapitulation\PeksosRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\Peksos\Recapitulation\PeksosRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.peksos.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/peksos/rekapitulasi',
    'as' => 'cluster_5.peksos.recapitulation.',
], function () {
    Route::get('/', PeksosRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.peksos.recapitulation|admin.cluster_5.peksos.recapitulation.list|admin.cluster_5.peksos.recapitulation.create|admin.cluster_5.peksos.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.peksos.index')
                ->push(
                    __('Rekapitulasi'),
                    route('admin.cluster_5.peksos.recapitulation.index')
                );
        });

    Route::get('create', PeksosRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.peksos.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.peksos.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi'),
                    route('admin.cluster_5.peksos.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', PeksosRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.peksos.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, PeksosRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.peksos.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi'),
                        route('admin.cluster_5.peksos.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
