<?php

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\PusatKreatifitasAnak;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\PusatKreatifitasAnakCreateForm;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\PusatKreatifitasAnakList;
use App\Http\Livewire\Backend\Cluster4\PusatKreatifitasAnak\PusatKreatifitasAnakUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_4.pusat_kreatifitas_anak'.
Route::group([
    'prefix' => 'klaster-4/pusat-kreatifitas-anak',
    'as' => 'cluster_4.pusat_kreatifitas_anak.',
], function () {
    Route::get('/', PusatKreatifitasAnakList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_4.pusat_kreatifitas_anak|admin.cluster_4.pusat_kreatifitas_anak.list|admin.cluster_4.pusat_kreatifitas_anak.create|admin.cluster_4.pusat_kreatifitas_anak.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster IV'))
                ->push(__('Pusat Kreatifitas Anak'), route('admin.cluster_4.pusat_kreatifitas_anak.index'));
        });

    Route::get('create', PusatKreatifitasAnakCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_4.pusat_kreatifitas_anak.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_4.pusat_kreatifitas_anak.index')
                ->push(__('Buat Pusat Kreatifitas Anak'), route('admin.cluster_4.pusat_kreatifitas_anak.create'));
        });

    Route::group(['prefix' => '{pusatKreatifitasAnak}'], function () {
        Route::get('edit', PusatKreatifitasAnakUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_4.pusat_kreatifitas_anak.create')
            ->breadcrumbs(function (Trail $trail, PusatKreatifitasAnak $pusatKreatifitasAnak) {
                $trail->parent('admin.cluster_4.pusat_kreatifitas_anak.index', $pusatKreatifitasAnak)
                    ->push(__('Ubah Pusat Kreatifitas Anak'), route('admin.cluster_4.pusat_kreatifitas_anak.edit', $pusatKreatifitasAnak));
            });
    });
});
