<?php

use App\Domains\Cluster5\Models\PerlindunganKhususAnak\PerlindunganKhususAnakRecapitulation;
use App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Recapitulation\PerlindunganKhususAnakRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Recapitulation\PerlindunganKhususAnakRecapitulationList;
use App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Recapitulation\PerlindunganKhususAnakRecapitulationUpdateForm;
use App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\PerlindunganKhususAnakImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.perlindungan_khusus_anak.recapitulation'.
Route::group([
    'prefix' => 'klaster-5/perlindungan-khusus-anak/rekapitulasi',
    'as' => 'cluster_5.perlindungan_khusus_anak.recapitulation.',
], function () {
    Route::get('/', PerlindunganKhususAnakRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.perlindungan_khusus_anak.recapitulation|admin.cluster_5.perlindungan_khusus_anak.recapitulation.list|admin.cluster_5.perlindungan_khusus_anak.recapitulation.create|admin.cluster_5.perlindungan_khusus_anak.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push('Klaster V')
                ->push('Perlindungan Khusus Anak')
                ->push(__('Rekapitulasi Perlindungan Khusus Anak'), route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.index'));
        });

    Route::get('import', PerlindunganKhususAnakImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.anak_korban_terorisme.recapitulation.index')
                ->push(__('Impor Perlindungan Khusus Anak'), route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.import'));
        });

    Route::get('create', PerlindunganKhususAnakRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.perlindungan_khusus_anak.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.perlindungan_khusus_anak.recapitulation.index')
                ->push(__('Buat Rekapitulasi Perlindungan Khusus Anak'), route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', PerlindunganKhususAnakRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.perlindungan_khusus_anak.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, PerlindunganKhususAnakRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_5.perlindungan_khusus_anak.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Perlindungan Khusus Anak'), route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.edit', $recapitulation));
            });
    });
});
