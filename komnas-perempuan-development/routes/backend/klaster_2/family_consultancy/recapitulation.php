<?php

use App\Domains\Cluster2\Models\FamilyConsultancyRecapitulation;
use App\Http\Livewire\Backend\Cluster2\FamilyConsultancy\Recapitulation\FamilyConsultancyRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster2\FamilyConsultancy\Recapitulation\FamilyConsultancyRecapitulationList;
use App\Http\Livewire\Backend\Cluster2\FamilyConsultancy\Recapitulation\FamilyConsultancyRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_2.family_consultancy.recapitulation'.
Route::group([
    'prefix' => 'klaster-2/lembaga-konsultasi-keluarga/rekapitulasi',
    'as' => 'cluster_2.family_consultancy.recapitulation.',
], function () {
    Route::get('/', FamilyConsultancyRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_2.family_consultancy.recapitulation|admin.cluster_2.family_consultancy.recapitulation.list|admin.cluster_2.family_consultancy.recapitulation.create|admin.cluster_2.family_consultancy.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster II'))
                ->push(__('Lembaga Konsultasi Keluarga'), route('admin.cluster_2.family_consultancy.index'))
                ->push(__('Rekapitulasi Lembaga Konsultasi Keluarga'), route('admin.cluster_2.family_consultancy.recapitulation.index'));
        });

    Route::get('create', FamilyConsultancyRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_2.family_consultancy.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.family_consultancy.recapitulation.index')
                ->push(__('Buat Rekapitulasi Lembaga Konsultasi Keluarga'), route('admin.cluster_2.family_consultancy.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', FamilyConsultancyRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_2.family_consultancy.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, FamilyConsultancyRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_2.family_consultancy.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Lembaga Konsultasi Keluarga'), route('admin.cluster_2.family_consultancy.recapitulation.edit', $recapitulation));
            });
    });
});
