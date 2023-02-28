<?php

use App\Domains\Cluster5\Models\AnakKorbanTerorisme\AnakKorbanTerorismeRecapitulation;
use App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Recapitulation\AnakKorbanTerorismeRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Recapitulation\AnakKorbanTerorismeRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Recapitulation\AnakKorbanTerorismeRecapitulationUpdateForm;
use App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\AnakKorbanTerorismeImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.anak_korban_terorisme.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/anak-korban-terorisme-dan-radikalisme/rekapitulasi',
    'as' => 'cluster_5.anak_korban_terorisme.recapitulation.',
], function () {
    Route::get('/', AnakKorbanTerorismeRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.anak_korban_terorisme.recapitulation|admin.cluster_5.anak_korban_terorisme.recapitulation.list|admin.cluster_5.anak_korban_terorisme.recapitulation.create|admin.cluster_5.anak_korban_terorisme.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push('Klaster V')
                ->push('Anak Korban Terorisme dan Radikalisme')
                ->push(
                    __('Rekapitulasi Anak Korban Terorisme dan Radikalisme'),
                    route('admin.cluster_5.anak_korban_terorisme.recapitulation.index')
                );
        });

    Route::get('import', AnakKorbanTerorismeImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.anak_korban_terorisme.recapitulation.index')
                ->push(__('Impor Anak Korban Terorisme'), route('admin.cluster_5.anak_korban_terorisme.recapitulation.import'));
        });

    Route::get('create', AnakKorbanTerorismeRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.anak_korban_terorisme.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.anak_korban_terorisme.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi Anak Korban Terorisme dan Radikalisme'),
                    route('admin.cluster_5.anak_korban_terorisme.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', AnakKorbanTerorismeRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.anak_korban_terorisme.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, AnakKorbanTerorismeRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.anak_korban_terorisme.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi Anak Korban Terorisme dan Radikalisme'),
                        route('admin.cluster_5.anak_korban_terorisme.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
