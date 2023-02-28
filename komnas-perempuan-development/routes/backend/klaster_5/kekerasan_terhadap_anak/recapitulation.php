<?php

use App\Domains\Cluster5\Models\KekerasanTerhadapAnak\KekerasanTerhadapAnakRecapitulation;
use App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Recapitulation\KekerasanTerhadapAnakRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Recapitulation\KekerasanTerhadapAnakRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\Recapitulation\KekerasanTerhadapAnakRecapitulationUpdateForm;
use App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak\KekerasanTerhadapAnakImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.kekerasan_terhadap_anak.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/kekerasan-terhadap-anak/rekapitulasi',
    'as' => 'cluster_5.kekerasan_terhadap_anak.recapitulation.',
], function () {
    Route::get('/', KekerasanTerhadapAnakRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.kekerasan_terhadap_anak.recapitulation|admin.cluster_5.kekerasan_terhadap_anak.recapitulation.list|admin.cluster_5.kekerasan_terhadap_anak.recapitulation.create|admin.cluster_5.kekerasan_terhadap_anak.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push('Klaster V')
                ->push('Anak Korban Terorisme dan Radikalisme')
                ->push(
                    __('Rekapitulasi Anak Korban Terorisme dan Radikalisme'),
                    route('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.index')
                );
        });

    Route::get('import', KekerasanTerhadapAnakImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.index')
                ->push(__('Impor Anak Korban Terorisme'), route('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.import'));
        });

    Route::get('create', KekerasanTerhadapAnakRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.kekerasan_terhadap_anak.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi Anak Korban Terorisme dan Radikalisme'),
                    route('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', KekerasanTerhadapAnakRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.kekerasan_terhadap_anak.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, KekerasanTerhadapAnakRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi Anak Korban Terorisme dan Radikalisme'),
                        route('admin.cluster_5.kekerasan_terhadap_anak.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
