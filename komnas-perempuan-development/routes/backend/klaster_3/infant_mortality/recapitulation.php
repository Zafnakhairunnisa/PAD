<?php

use App\Domains\Cluster3\Models\InfantMortality\InfantMortalityRecapitulation;
use App\Http\Livewire\Backend\Cluster3\InfantMortality\Recapitulation\InfantMortalityRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster3\InfantMortality\Recapitulation\InfantMortalityRecapitulationList;
use App\Http\Livewire\Backend\Cluster3\InfantMortality\Recapitulation\InfantMortalityRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_3.infant_mortality.recapitulation'.
Route::group([
    'prefix' => 'klaster-3/angka-kematian-bayi/rekapitulasi',
    'as' => 'cluster_3.infant_mortality.recapitulation.',
], function () {
    Route::get('/', InfantMortalityRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_3.infant_mortality.recapitulation|admin.cluster_3.infant_mortality.recapitulation.list|admin.cluster_3.infant_mortality.recapitulation.create|admin.cluster_3.infant_mortality.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster III'))
                ->push(__('Angka Kematian Bayi'))
                ->push(__('Rekapitulasi Angka Kematian Bayi'), route('admin.cluster_3.infant_mortality.recapitulation.index'));
        });

    Route::get('create', InfantMortalityRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_3.infant_mortality.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.infant_mortality.recapitulation.index')
                ->push(__('Buat Rekapitulasi Angka Kematian Bayi'), route('admin.cluster_3.infant_mortality.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', InfantMortalityRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_3.infant_mortality.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, InfantMortalityRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_3.infant_mortality.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Angka Kematian Bayi'), route('admin.cluster_3.infant_mortality.recapitulation.edit', $recapitulation));
            });
    });
});
