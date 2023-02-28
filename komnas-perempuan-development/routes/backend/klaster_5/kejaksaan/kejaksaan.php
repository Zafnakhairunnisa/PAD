<?php

use App\Domains\Cluster5\Models\Kejaksaan\Kejaksaan;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\KejaksaanCreateForm;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\KejaksaanList;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\KejaksaanUpdateForm;
use App\Http\Livewire\Backend\Cluster5\Kejaksaan\KejaksaanImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.kejaksaan'.
Route::group([
    'prefix' => 'klaster-5/kejaksaan',
    'as' => 'cluster_5.kejaksaan.',
], function () {
    Route::get('/', KejaksaanList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.kejaksaan|admin.cluster_5.kejaksaan.list|admin.cluster_5.kejaksaan.create|admin.cluster_5.kejaksaan.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster V'))
                ->push(
                    __('Kejaksaan Daerah DIY'),
                    route('admin.cluster_5.kejaksaan.index')
                );
        });

    Route::get('create', KejaksaanCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.kejaksaan.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.kejaksaan.index')
                ->push(
                    __('Buat Kejaksaan Daerah DIY'),
                    route('admin.cluster_5.kejaksaan.create')
                );
        });

    Route::get('import', KejaksaanImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.kejaksaan.index')
                ->push(__('Impor Kejaksaan'), route('admin.cluster_5.kejaksaan.import'));
        });

    Route::group(['prefix' => '{kejaksaan}'], function () {
        Route::get('edit', KejaksaanUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.kejaksaan.create')
            ->breadcrumbs(function (Trail $trail, Kejaksaan $kejaksaan) {
                $trail->parent('admin.cluster_5.kejaksaan.index', $kejaksaan)
                    ->push(
                        __('Ubah Kejaksaan Daerah DIY'),
                        route('admin.cluster_5.kejaksaan.edit', $kejaksaan)
                    );
            });
    });
});
