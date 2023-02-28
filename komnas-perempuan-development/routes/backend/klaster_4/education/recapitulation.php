<?php

use App\Domains\Cluster4\Models\Education\EducationRecapitulation;
use App\Http\Livewire\Backend\Cluster4\Education\Recapitulation\EducationRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster4\Education\Recapitulation\EducationRecapitulationList;
use App\Http\Livewire\Backend\Cluster4\Education\Recapitulation\EducationRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_4.education.recapitulation'.
Route::group([
    'prefix' => 'klaster-4/pendidika/rekapitulasi',
    'as' => 'cluster_4.education.recapitulation.',
], function () {
    Route::get('/', EducationRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_4.education.recapitulation|admin.cluster_4.education.recapitulation.list|admin.cluster_4.education.recapitulation.create|admin.cluster_4.education.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push('Klaster IV')
                ->push(__('Rekapitulasi Pendidikan'), route('admin.cluster_4.education.recapitulation.index'));
        });

    Route::get('create', EducationRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_4.education.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_4.education.recapitulation.index')
                ->push(__('Buat Rekapitulasi Pendidikan'), route('admin.cluster_4.education.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', EducationRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_4.education.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, EducationRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_4.education.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Pendidikan'), route('admin.cluster_4.education.recapitulation.edit', $recapitulation));
            });
    });
});
