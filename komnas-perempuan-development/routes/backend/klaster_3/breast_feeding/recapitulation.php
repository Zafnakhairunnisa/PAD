<?php

use App\Domains\Cluster3\Models\BreastFeeding\BreastFeedingRecapitulation;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Recapitulation\BreastFeedingRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Recapitulation\BreastFeedingRecapitulationList;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Recapitulation\BreastFeedingRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_3.breast_feeding.recapitulation'.
Route::group([
    'prefix' => 'klaster-3/pemberian-asi/rekapitulasi',
    'as' => 'cluster_3.breast_feeding.recapitulation.',
], function () {
    Route::get('/', BreastFeedingRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_3.breast_feeding.recapitulation|admin.cluster_3.breast_feeding.recapitulation.list|admin.cluster_3.breast_feeding.recapitulation.create|admin.cluster_3.breast_feeding.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.breast_feeding.index')
                ->push(__('Rekapitulasi Pemberian Air Susu Ibu'), route('admin.cluster_3.breast_feeding.recapitulation.index'));
        });

    Route::get('create', BreastFeedingRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_3.breast_feeding.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.breast_feeding.recapitulation.index')
                ->push(__('Buat Rekapitulasi Pemberian Air Susu Ibu'), route('admin.cluster_3.breast_feeding.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', BreastFeedingRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_3.breast_feeding.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, BreastFeedingRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_3.breast_feeding.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Pemberian Air Susu Ibu'), route('admin.cluster_3.breast_feeding.recapitulation.edit', $recapitulation));
            });
    });
});
