<?php

use App\Domains\Cluster3\Models\ChildNutrition\ChildNutritionRecapitulation;
use App\Http\Livewire\Backend\Cluster3\ChildNutrition\Recapitulation\ChildNutritionRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster3\ChildNutrition\Recapitulation\ChildNutritionRecapitulationList;
use App\Http\Livewire\Backend\Cluster3\ChildNutrition\Recapitulation\ChildNutritionRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_3.child_nutrition.recapitulation'.
Route::group([
    'prefix' => 'klaster-3/status-gizi-anak/rekapitulasi',
    'as' => 'cluster_3.child_nutrition.recapitulation.',
], function () {
    Route::get('/', ChildNutritionRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_3.child_nutrition.recapitulation|admin.cluster_3.child_nutrition.recapitulation.list|admin.cluster_3.child_nutrition.recapitulation.create|admin.cluster_3.child_nutrition.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster III'))
                ->push(__('Angka Kematian Bayi'))
                ->push(__('Rekapitulasi Angka Kematian Bayi'), route('admin.cluster_3.child_nutrition.recapitulation.index'));
        });

    Route::get('create', ChildNutritionRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_3.child_nutrition.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.child_nutrition.recapitulation.index')
                ->push(__('Buat Rekapitulasi Angka Kematian Bayi'), route('admin.cluster_3.child_nutrition.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', ChildNutritionRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_3.child_nutrition.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, ChildNutritionRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_3.child_nutrition.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Angka Kematian Bayi'), route('admin.cluster_3.child_nutrition.recapitulation.edit', $recapitulation));
            });
    });
});
