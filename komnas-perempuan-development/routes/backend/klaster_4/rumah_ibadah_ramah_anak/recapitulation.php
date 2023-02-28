<?php

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulation;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Recapitulation\RumahIbadahRamahAnakRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Recapitulation\RumahIbadahRamahAnakRecapitulationList;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\Recapitulation\RumahIbadahRamahAnakRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation'.
Route::group([
    'prefix' => 'klaster-4/rumah-ibadah-ramah-anak/rekapitulasi',
    'as' => 'cluster_4.rumah_ibadah_ramah_anak.recapitulation.',
], function () {
    Route::get('/', RumahIbadahRamahAnakRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation|admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.list|admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.create|admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_4.rumah_ibadah_ramah_anak.index')
                ->push(__('Rekapitulasi Rumah Ibadah Ramah Anak'), route('admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.index'));
        });

    Route::get('create', RumahIbadahRamahAnakRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.index')
                ->push(__('Buat Rekapitulasi Rumah Ibadah Ramah Anak'), route('admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', RumahIbadahRamahAnakRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, RumahIbadahRamahAnakRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Rumah Ibadah Ramah Anak'), route('admin.cluster_4.rumah_ibadah_ramah_anak.recapitulation.edit', $recapitulation));
            });
    });
});
