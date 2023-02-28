<?php

use App\Domains\Cluster5\Models\Pengadilan\PengadilanRecapitulation;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\Recapitulation\PengadilanRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\Recapitulation\PengadilanRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\Recapitulation\PengadilanRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.pengadilan.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/pengadilan/rekapitulasi',
    'as' => 'cluster_5.pengadilan.recapitulation.',
], function () {
    Route::get('/', PengadilanRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.pengadilan.recapitulation|admin.cluster_5.pengadilan.recapitulation.list|admin.cluster_5.pengadilan.recapitulation.create|admin.cluster_5.pengadilan.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.pengadilan.index')
                ->push(
                    __('Rekapitulasi'),
                    route('admin.cluster_5.pengadilan.recapitulation.index')
                );
        });

    Route::get('create', PengadilanRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.pengadilan.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.pengadilan.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi'),
                    route('admin.cluster_5.pengadilan.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', PengadilanRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.pengadilan.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, PengadilanRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.pengadilan.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi'),
                        route('admin.cluster_5.pengadilan.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
