<?php

use App\Domains\Cluster2\Models\FamilyConsultancy\FamilyConsultancy;
use App\Http\Livewire\Backend\Cluster2\FamilyConsultancy\FamilyConsultancyCreateForm;
use App\Http\Livewire\Backend\Cluster2\FamilyConsultancy\FamilyConsultancyImportForm;
use App\Http\Livewire\Backend\Cluster2\FamilyConsultancy\FamilyConsultancyList;
use App\Http\Livewire\Backend\Cluster2\FamilyConsultancy\FamilyConsultancyUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_2.family_consultancy'.
Route::group([
    'prefix' => 'klaster-2/lembaga-konsultasi-keluarga',
    'as' => 'cluster_2.family_consultancy.',
], function () {
    Route::get('/', FamilyConsultancyList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_2.family_consultancy|admin.cluster_2.family_consultancy.list|admin.cluster_2.family_consultancy.create|admin.cluster_2.family_consultancy.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster II'))
                ->push(__('Lembaga Konsultasi Keluarga'), route('admin.cluster_2.family_consultancy.index'));
        });

    Route::get('create', FamilyConsultancyCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_2.family_consultancy.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.family_consultancy.index')
                ->push(__('Buat Lembaga Konsultasi Keluarga'), route('admin.cluster_2.family_consultancy.create'));
        });

    Route::get('import', FamilyConsultancyImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.family_consultancy.index')
                ->push(__('Impor Lembaga Konsultasi Keluarga'), route('admin.cluster_2.family_consultancy.import'));
        });

    Route::group(['prefix' => '{familyConsultancy}'], function () {
        Route::get('edit', FamilyConsultancyUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_2.family_consultancy.create')
            ->breadcrumbs(function (Trail $trail, FamilyConsultancy $familyConsultancy) {
                $trail->parent('admin.cluster_2.family_consultancy.index', $familyConsultancy)
                    ->push(__('Ubah Lembaga Konsultasi Keluarga'), route('admin.cluster_2.family_consultancy.edit', $familyConsultancy));
            });
    });
});
