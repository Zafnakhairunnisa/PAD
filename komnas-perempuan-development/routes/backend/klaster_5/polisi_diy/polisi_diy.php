<?php

use App\Domains\Cluster5\Models\PolisiDiy\PolisiDiy;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\PolisiDiyCreateForm;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\PolisiDiyList;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\PolisiDiyUpdateForm;
use App\Http\Livewire\Backend\Cluster5\PolisiDiy\PolisiDiyImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.polisi_diy'.
Route::group([
    'prefix' => 'klaster-5/polisi_diy',
    'as' => 'cluster_5.polisi_diy.',
], function () {
    Route::get('/', PolisiDiyList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.polisi_diy|admin.cluster_5.polisi_diy.list|admin.cluster_5.polisi_diy.create|admin.cluster_5.polisi_diy.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster V'))
                ->push(
                    __('Polisi Daerah DIY'),
                    route('admin.cluster_5.polisi_diy.index')
                );
        });

    Route::get('create', PolisiDiyCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.polisi_diy.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.polisi_diy.index')
                ->push(
                    __('Buat Polisi Daerah DIY'),
                    route('admin.cluster_5.polisi_diy.create')
                );
        });

    Route::get('import', PolisiDiyImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.polisi_diy.index')
                ->push(__('Impor Polisi DIY'), route('admin.cluster_5.polisi_diy.import'));
        });

    Route::group(['prefix' => '{polisi_diy}'], function () {
        Route::get('edit', PolisiDiyUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.polisi_diy.create')
            ->breadcrumbs(function (Trail $trail, PolisiDiy $polisi_diy) {
                $trail->parent('admin.cluster_5.polisi_diy.index', $polisi_diy)
                    ->push(
                        __('Ubah Polisi Daerah DIY'),
                        route('admin.cluster_5.polisi_diy.edit', $polisi_diy)
                    );
            });
    });
});
