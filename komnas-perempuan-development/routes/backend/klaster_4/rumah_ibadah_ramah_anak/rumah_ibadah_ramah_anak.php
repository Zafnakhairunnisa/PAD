<?php

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\RumahIbadahRamahAnak;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\RumahIbadahRamahAnakCreateForm;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\RumahIbadahRamahAnakList;
use App\Http\Livewire\Backend\Cluster4\RumahIbadahRamahAnak\RumahIbadahRamahAnakUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_4.rumah_ibadah_ramah_anak'.
Route::group([
    'prefix' => 'klaster-4/rumah-ibadah-ramah-anak',
    'as' => 'cluster_4.rumah_ibadah_ramah_anak.',
], function () {
    Route::get('/', RumahIbadahRamahAnakList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_4.rumah_ibadah_ramah_anak|admin.cluster_4.rumah_ibadah_ramah_anak.list|admin.cluster_4.rumah_ibadah_ramah_anak.create|admin.cluster_4.rumah_ibadah_ramah_anak.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster IV'))
                ->push(__('Rumah Ibadah Ramah Anak'), route('admin.cluster_4.rumah_ibadah_ramah_anak.index'));
        });

    Route::get('create', RumahIbadahRamahAnakCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_4.rumah_ibadah_ramah_anak.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_4.rumah_ibadah_ramah_anak.index')
                ->push(__('Buat Rumah Ibadah Ramah Anak'), route('admin.cluster_4.rumah_ibadah_ramah_anak.create'));
        });

    Route::group(['prefix' => '{rumahIbadahRamahAnak}'], function () {
        Route::get('edit', RumahIbadahRamahAnakUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_4.rumah_ibadah_ramah_anak.create')
            ->breadcrumbs(function (Trail $trail, RumahIbadahRamahAnak $rumahIbadahRamahAnak) {
                $trail->parent('admin.cluster_4.rumah_ibadah_ramah_anak.index', $rumahIbadahRamahAnak)
                    ->push(__('Ubah Rumah Ibadah Ramah Anak'), route('admin.cluster_4.rumah_ibadah_ramah_anak.edit', $rumahIbadahRamahAnak));
            });
    });
});
