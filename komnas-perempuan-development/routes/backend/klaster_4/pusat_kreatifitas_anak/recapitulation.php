<?php

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\PusatKreatifitasAnakRecapitulation;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Recapitulation\PusatKreatifitasAnakRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Recapitulation\PusatKreatifitasAnakRecapitulationList;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\Recapitulation\PusatKreatifitasAnakRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_4.pusat_kreatifitas_anak.recapitulation'.
Route::group([
    'prefix' => 'klaster-4/pusat-kreatifitas-anak/rekapitulasi',
    'as' => 'cluster_4.pusat_kreatifitas_anak.recapitulation.',
], function () {
    Route::get('/', PusatKreatifitasAnakRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_4.pusat_kreatifitas_anak.recapitulation|admin.cluster_4.pusat_kreatifitas_anak.recapitulation.list|admin.cluster_4.pusat_kreatifitas_anak.recapitulation.create|admin.cluster_4.pusat_kreatifitas_anak.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_4.pusat_kreatifitas_anak.index')
                ->push(__('Rekapitulasi Pusat Kreatifitas Anak'), route('admin.cluster_4.pusat_kreatifitas_anak.recapitulation.index'));
        });

    Route::get('create', PusatKreatifitasAnakRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_4.pusat_kreatifitas_anak.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_4.pusat_kreatifitas_anak.recapitulation.index')
                ->push(__('Buat Rekapitulasi Pusat Kreatifitas Anak'), route('admin.cluster_4.pusat_kreatifitas_anak.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', PusatKreatifitasAnakRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_4.pusat_kreatifitas_anak.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, PusatKreatifitasAnakRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_4.pusat_kreatifitas_anak.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Pusat Kreatifitas Anak'), route('admin.cluster_4.pusat_kreatifitas_anak.recapitulation.edit', $recapitulation));
            });
    });
});
