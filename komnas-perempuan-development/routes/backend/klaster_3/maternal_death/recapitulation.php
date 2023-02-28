<?php

use App\Domains\Cluster3\Models\MaternalDeath\MaternalDeathRecapitulation;
use App\Http\Livewire\Backend\Cluster3\MaternalDeath\Recapitulation\MaternalDeathRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster3\MaternalDeath\Recapitulation\MaternalDeathRecapitulationList;
use App\Http\Livewire\Backend\Cluster3\MaternalDeath\Recapitulation\MaternalDeathRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_3.maternal_death.recapitulation'.
Route::group([
    'prefix' => 'klaster-3/angka-kematian-ibu/rekapitulasi',
    'as' => 'cluster_3.maternal_death.recapitulation.',
], function () {
    Route::get('/', MaternalDeathRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_3.maternal_death.recapitulation|admin.cluster_3.maternal_death.recapitulation.list|admin.cluster_3.maternal_death.recapitulation.create|admin.cluster_3.maternal_death.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster III'))
                ->push(__('Angka Kematian Bayi'))
                ->push(__('Rekapitulasi Angka Kematian Bayi'), route('admin.cluster_3.maternal_death.recapitulation.index'));
        });

    Route::get('create', MaternalDeathRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_3.maternal_death.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.maternal_death.recapitulation.index')
                ->push(__('Buat Rekapitulasi Angka Kematian Bayi'), route('admin.cluster_3.maternal_death.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', MaternalDeathRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_3.maternal_death.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, MaternalDeathRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_3.maternal_death.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Angka Kematian Bayi'), route('admin.cluster_3.maternal_death.recapitulation.edit', $recapitulation));
            });
    });
});
