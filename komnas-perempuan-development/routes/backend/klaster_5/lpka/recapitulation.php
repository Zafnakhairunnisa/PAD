<?php

use App\Domains\Cluster5\Models\Lpka\LpkaRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Lpka\Recapitulation\LpkaRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\Lpka\Recapitulation\LpkaRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\Lpka\Recapitulation\LpkaRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.lpka.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/lpka/rekapitulasi',
    'as' => 'cluster_5.lpka.recapitulation.',
], function () {
    Route::get('/', LpkaRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.lpka.recapitulation|admin.cluster_5.lpka.recapitulation.list|admin.cluster_5.lpka.recapitulation.create|admin.cluster_5.lpka.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.lpka.index')
                ->push(
                    __('Rekapitulasi'),
                    route('admin.cluster_5.lpka.recapitulation.index')
                );
        });

    Route::get('create', LpkaRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.lpka.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.lpka.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi'),
                    route('admin.cluster_5.lpka.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', LpkaRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.lpka.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, LpkaRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.lpka.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi'),
                        route('admin.cluster_5.lpka.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
