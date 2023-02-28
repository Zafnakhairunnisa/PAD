<?php

use App\Domains\Cluster3\Models\MotherAndDaughterCard\MotherAndDaughterCardRecapitulation;
use App\Http\Livewire\Backend\Cluster3\MotherAndDaughterCard\Recapitulation\MotherAndDaughterCardRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster3\MotherAndDaughterCard\Recapitulation\MotherAndDaughterCardRecapitulationList;
use App\Http\Livewire\Backend\Cluster3\MotherAndDaughterCard\Recapitulation\MotherAndDaughterCardRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_3.mother_and_daughter_card.recapitulation'.
Route::group([
    'prefix' => 'klaster-3/kartu-ibu-dan-anak/rekapitulasi',
    'as' => 'cluster_3.mother_and_daughter_card.recapitulation.',
], function () {
    Route::get('/', MotherAndDaughterCardRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_3.mother_and_daughter_card.recapitulation|admin.cluster_3.mother_and_daughter_card.recapitulation.list|admin.cluster_3.mother_and_daughter_card.recapitulation.create|admin.cluster_3.mother_and_daughter_card.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster III'))
                ->push(__('Kartu Ibu dan Anak'))
                ->push(__('Rekapitulasi Kartu Ibu dan Anak'), route('admin.cluster_3.mother_and_daughter_card.recapitulation.index'));
        });

    Route::get('create', MotherAndDaughterCardRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_3.mother_and_daughter_card.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.mother_and_daughter_card.recapitulation.index')
                ->push(__('Buat Rekapitulasi Kartu Ibu dan Anak'), route('admin.cluster_3.mother_and_daughter_card.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', MotherAndDaughterCardRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_3.mother_and_daughter_card.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, MotherAndDaughterCardRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_3.mother_and_daughter_card.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Kartu Ibu dan Anak'), route('admin.cluster_3.mother_and_daughter_card.recapitulation.edit', $recapitulation));
            });
    });
});
