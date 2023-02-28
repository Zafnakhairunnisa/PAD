<?php

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulation;
use App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution\Recapitulation\ChildWelfareInstitutionRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution\Recapitulation\ChildWelfareInstitutionRecapitulationList;
use App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution\Recapitulation\ChildWelfareInstitutionRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_2.child_welfare_institution.recapitulation'.
Route::group([
    'prefix' => 'klaster-2/lembaga-kesejahteraan-sosial-anak/rekapitulasi',
    'as' => 'cluster_2.child_welfare_institution.recapitulation.',
], function () {
    Route::get('/', ChildWelfareInstitutionRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_2.child_welfare_institution.recapitulation|admin.cluster_2.child_welfare_institution.recapitulation.list|admin.cluster_2.child_welfare_institution.recapitulation.create|admin.cluster_2.child_welfare_institution.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.child_welfare_institution.index')
                ->push(__('Rekapitulasi Lembaga Kesejahteraan Sosial Anak'), route('admin.cluster_2.child_welfare_institution.recapitulation.index'));
        });

    Route::get('create', ChildWelfareInstitutionRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_2.child_welfare_institution.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.child_welfare_institution.recapitulation.index')
                ->push(__('Buat Rekapitulasi Lembaga Kesejahteraan Sosial Anak'), route('admin.cluster_2.child_welfare_institution.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', ChildWelfareInstitutionRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_2.child_welfare_institution.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, ChildWelfareInstitutionRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_2.child_welfare_institution.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Lembaga Kesejahteraan Sosial Anak'), route('admin.cluster_2.child_welfare_institution.recapitulation.edit', $recapitulation));
            });
    });
});
