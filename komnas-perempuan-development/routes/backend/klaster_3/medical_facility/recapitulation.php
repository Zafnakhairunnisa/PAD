<?php

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacilityRecapitulation;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Recapitulation\MedicalFacilityRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Recapitulation\MedicalFacilityRecapitulationList;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Recapitulation\MedicalFacilityRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_3.medical_facility.recapitulation'.
Route::group([
    'prefix' => 'klaster-3/fasilitas-kesehatan-ramah-anak/rekapitulasi',
    'as' => 'cluster_3.medical_facility.recapitulation.',
], function () {
    Route::get('/', MedicalFacilityRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_3.medical_facility.recapitulation|admin.cluster_3.medical_facility.recapitulation.list|admin.cluster_3.medical_facility.recapitulation.create|admin.cluster_3.medical_facility.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.medical_facility.index')
                ->push(
                    __('Rekapitulasi Fasilitas Kesehatan Ramah Anak'),
                    route('admin.cluster_3.medical_facility.recapitulation.index')
                );
        });

    Route::get('create', MedicalFacilityRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_3.medical_facility.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.medical_facility.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi Fasilitas Kesehatan Ramah Anak'),
                    route('admin.cluster_3.medical_facility.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', MedicalFacilityRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_3.medical_facility.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, MedicalFacilityRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_3.medical_facility.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi Fasilitas Kesehatan Ramah Anak'),
                        route('admin.cluster_3.medical_facility.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
