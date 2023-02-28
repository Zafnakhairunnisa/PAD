<?php

use App\Domains\Cluster2\Models\PaudHi\PaudHiRecapitulation;
use App\Http\Livewire\Backend\Cluster2\PaudHi\Recapitulation\PaudHiRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster2\PaudHi\Recapitulation\PaudHiRecapitulationList;
use App\Http\Livewire\Backend\Cluster2\PaudHi\Recapitulation\PaudHiRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_2.paud_hi.recapitulation'.
Route::group([
    'prefix' => 'klaster-2/paud-hi/rekapitulasi',
    'as' => 'cluster_2.paud_hi.recapitulation.',
], function () {
    Route::get('/', PaudHiRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_2.paud_hi.recapitulation|admin.cluster_2.paud_hi.recapitulation.list|admin.cluster_2.paud_hi.recapitulation.create|admin.cluster_2.paud_hi.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster II'))
                ->push(__('PAUD HI'))
                ->push(__('Rekapitulasi PAUD HI'), route('admin.cluster_2.paud_hi.recapitulation.index'));
        });

    Route::get('create', PaudHiRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_2.paud_hi.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.paud_hi.recapitulation.index')
                ->push(__('Buat Rekapitulasi PAUD HI'), route('admin.cluster_2.paud_hi.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', PaudHiRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_2.paud_hi.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, PaudHiRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_2.paud_hi.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi PAUD HI'), route('admin.cluster_2.paud_hi.recapitulation.edit', $recapitulation));
            });
    });
});
