<?php

use App\Domains\Cluster5\Models\Patbm\Patbm;
use App\Http\Livewire\Backend\Cluster5\Patbm\PatbmCreateForm;
use App\Http\Livewire\Backend\Cluster5\Patbm\PatbmList;
use App\Http\Livewire\Backend\Cluster5\Patbm\PatbmUpdateForm;
use App\Http\Livewire\Backend\Cluster5\Patbm\PatbmImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.patbm'.
Route::group([
    'prefix' => 'klaster-5/patbm',
    'as' => 'cluster_5.patbm.',
], function () {
    Route::get('/', PatbmList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.patbm|admin.cluster_5.patbm.list|admin.cluster_5.patbm.create|admin.cluster_5.patbm.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster V'))
                ->push(
                    __('Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)'),
                    route('admin.cluster_5.patbm.index')
                );
        });

    Route::get('create', PatbmCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.patbm.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.patbm.index')
                ->push(
                    __('Buat Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)'),
                    route('admin.cluster_5.patbm.create')
                );
        });

    Route::get('import', PatbmImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.patbm.index')
                ->push(__('Impor Patbm'), route('admin.cluster_5.patbm.import'));
        });

    Route::group(['prefix' => '{patbm}'], function () {
        Route::get('edit', PatbmUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.patbm.create')
            ->breadcrumbs(function (Trail $trail, Patbm $patbm) {
                $trail->parent('admin.cluster_5.patbm.index', $patbm)
                    ->push(
                        __('Ubah Perlindungan Anak Terpadu Berbasis Masyarakat (PATBM)'),
                        route('admin.cluster_5.patbm.edit', $patbm)
                    );
            });
    });
});
