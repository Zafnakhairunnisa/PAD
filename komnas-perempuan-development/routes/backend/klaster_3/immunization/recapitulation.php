<?php

use App\Domains\Cluster3\Models\Immunization\ImmunizationRecapitulation;
use App\Http\Livewire\Backend\Cluster3\Immunization\Recapitulation\ImmunizationRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster3\Immunization\Recapitulation\ImmunizationRecapitulationList;
use App\Http\Livewire\Backend\Cluster3\Immunization\Recapitulation\ImmunizationRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_3.immunization.recapitulation'.
Route::group([
    'prefix' => 'klaster-3/imunisasi/rekapitulasi',
    'as' => 'cluster_3.immunization.recapitulation.',
], function () {
    Route::get('/', ImmunizationRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_3.immunization.recapitulation|admin.cluster_3.immunization.recapitulation.list|admin.cluster_3.immunization.recapitulation.create|admin.cluster_3.immunization.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster III'))
                ->push(__('Cakupan Imunisasi Dasar Lengkap'))
                ->push(__('Rekapitulasi Cakupan Imunisasi Dasar Lengkap'), route('admin.cluster_3.immunization.recapitulation.index'));
        });

    Route::get('create', ImmunizationRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_3.immunization.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.immunization.recapitulation.index')
                ->push(__('Buat Rekapitulasi Cakupan Imunisasi Dasar Lengkap'), route('admin.cluster_3.immunization.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', ImmunizationRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_3.immunization.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, ImmunizationRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_3.immunization.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Cakupan Imunisasi Dasar Lengkap'), route('admin.cluster_3.immunization.recapitulation.edit', $recapitulation));
            });
    });
});
