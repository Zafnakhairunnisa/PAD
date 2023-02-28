<?php

use App\Domains\Cluster3\Models\ChildBirth\ChildBirthRecapitulation;
use App\Http\Livewire\Backend\Cluster3\ChildBirth\Recapitulation\ChildBirthRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster3\ChildBirth\Recapitulation\ChildBirthRecapitulationList;
use App\Http\Livewire\Backend\Cluster3\ChildBirth\Recapitulation\ChildBirthRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_3.child_birth.recapitulation'.
Route::group([
    'prefix' => 'klaster-3/persalinan/rekapitulasi',
    'as' => 'cluster_3.child_birth.recapitulation.',
], function () {
    Route::get('/', ChildBirthRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_3.child_birth.recapitulation|admin.cluster_3.child_birth.recapitulation.list|admin.cluster_3.child_birth.recapitulation.create|admin.cluster_3.child_birth.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster III'))
                ->push(__('Persalinan di Fasilitas Kesehatan'))
                ->push(__('Rekapitulasi Persalinan di Fasilitas Kesehatan'), route('admin.cluster_3.child_birth.recapitulation.index'));
        });

    Route::get('create', ChildBirthRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_3.child_birth.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.child_birth.recapitulation.index')
                ->push(__('Buat Rekapitulasi Persalinan di Fasilitas Kesehatan'), route('admin.cluster_3.child_birth.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', ChildBirthRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_3.child_birth.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, ChildBirthRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_3.child_birth.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Persalinan di Fasilitas Kesehatan'), route('admin.cluster_3.child_birth.recapitulation.edit', $recapitulation));
            });
    });
});
