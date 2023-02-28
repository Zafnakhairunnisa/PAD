<?php

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacility;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\MedicalFacilityCreateForm;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\MedicalFacilityList;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\MedicalFacilityUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_3.medical_facility'.
Route::group([
    'prefix' => 'klaster-3/fasilitas-kesehatan-ramah-anak',
    'as' => 'cluster_3.medical_facility.',
], function () {
    Route::get('/', MedicalFacilityList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_3.medical_facility|admin.cluster_3.medical_facility.list|admin.cluster_3.medical_facility.create|admin.cluster_3.medical_facility.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster III'))
                ->push(
                    __('Fasilitas Kesehatan Ramah Anak'),
                    route('admin.cluster_3.medical_facility.index')
                );
        });

    Route::get('create', MedicalFacilityCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_3.medical_facility.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.medical_facility.index')
                ->push(
                    __('Buat Fasilitas Kesehatan Ramah Anak'),
                    route('admin.cluster_3.medical_facility.create')
                );
        });

    Route::group(['prefix' => '{medicalFacility}'], function () {
        Route::get('edit', MedicalFacilityUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_3.medical_facility.create')
            ->breadcrumbs(function (Trail $trail, MedicalFacility $medicalFacility) {
                $trail->parent('admin.cluster_3.medical_facility.index', $medicalFacility)
                    ->push(
                        __('Ubah Fasilitas Kesehatan Ramah Anak'),
                        route('admin.cluster_3.medical_facility.edit', $medicalFacility)
                    );
            });
    });
});
