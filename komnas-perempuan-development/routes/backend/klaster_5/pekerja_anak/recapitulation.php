<?php

use App\Domains\Cluster5\Models\PekerjaAnak\PekerjaAnakRecapitulation;
use App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Recapitulation\PekerjaAnakRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Recapitulation\PekerjaAnakRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Recapitulation\PekerjaAnakRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.pekerja_anak.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/pekerja-anak/rekapitulasi',
    'as' => 'cluster_5.pekerja_anak.recapitulation.',
], function () {
    Route::get('/', PekerjaAnakRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.pekerja_anak.recapitulation|admin.cluster_5.pekerja_anak.recapitulation.list|admin.cluster_5.pekerja_anak.recapitulation.create|admin.cluster_5.pekerja_anak.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push('Klaster V')
                ->push('Pekerja Anak')
                ->push(
                    __('Rekapitulasi Pekerja Anak'),
                    route('admin.cluster_5.pekerja_anak.recapitulation.index')
                );
        });

    Route::get('create', PekerjaAnakRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.pekerja_anak.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.pekerja_anak.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi Pekerja Anak'),
                    route('admin.cluster_5.pekerja_anak.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', PekerjaAnakRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.pekerja_anak.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, PekerjaAnakRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.pekerja_anak.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi Pekerja Anak'),
                        route('admin.cluster_5.pekerja_anak.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
