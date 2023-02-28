<?php

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitution;
use App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution\ChildWelfareInstitutionCreateForm;
use App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution\ChildWelfareInstitutionImportForm;
use App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution\ChildWelfareInstitutionList;
use App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution\ChildWelfareInstitutionUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_2.child_welfare_institution'.
Route::group([
    'prefix' => 'klaster-2/lembaga-kesejahteraan-sosial-anak',
    'as' => 'cluster_2.child_welfare_institution.',
], function () {
    Route::get('/', ChildWelfareInstitutionList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_2.child_welfare_institution|admin.cluster_2.child_welfare_institution.list|admin.cluster_2.child_welfare_institution.create|admin.cluster_2.child_welfare_institution.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster II'))
                ->push(__('Lembaga Kesejahteraan Sosial Anak'), route('admin.cluster_2.child_welfare_institution.index'));
        });

    Route::get('create', ChildWelfareInstitutionCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_2.child_welfare_institution.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.child_welfare_institution.index')
                ->push(__('Buat Lembaga Kesejahteraan Sosial Anak'), route('admin.cluster_2.child_welfare_institution.create'));
        });

    Route::get('import', ChildWelfareInstitutionImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.child_welfare_institution.index')
                ->push(__('Impor Lembaga Kesejahteraan Sosial Anak'), route('admin.cluster_2.child_welfare_institution.import'));
        });

    Route::group(['prefix' => '{childWelfareInstitution}'], function () {
        Route::get('edit', ChildWelfareInstitutionUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_2.child_welfare_institution.create')
            ->breadcrumbs(function (Trail $trail, ChildWelfareInstitution $childWelfareInstitution) {
                $trail->parent('admin.cluster_2.child_welfare_institution.index', $childWelfareInstitution)
                    ->push(__('Ubah Lembaga Kesejahteraan Sosial Anak'), route('admin.cluster_2.child_welfare_institution.edit', $childWelfareInstitution));
            });
    });
});
