<?php

use App\Domains\Cluster5\Models\Pengadilan\Pengadilan;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\PengadilanCreateForm;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\PengadilanList;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\PengadilanUpdateForm;
use App\Http\Livewire\Backend\Cluster5\Pengadilan\PengadilanImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.pengadilan'.
Route::group([
    'prefix' => 'klaster-5/pengadilan',
    'as' => 'cluster_5.pengadilan.',
], function () {
    Route::get('/', PengadilanList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.pengadilan|admin.cluster_5.pengadilan.list|admin.cluster_5.pengadilan.create|admin.cluster_5.pengadilan.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster V'))
                ->push(
                    __('Pengadilan DIY'),
                    route('admin.cluster_5.pengadilan.index')
                );
        });

    Route::get('create', PengadilanCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.pengadilan.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.pengadilan.index')
                ->push(
                    __('Buat Pengadilan DIY'),
                    route('admin.cluster_5.pengadilan.create')
                );
        });

    Route::get('import', PengadilanImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.pengadilan.index')
                ->push(__('Impor Pengadilan'), route('admin.cluster_5.pengadilan.import'));
        });

    Route::group(['prefix' => '{pengadilan}'], function () {
        Route::get('edit', PengadilanUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.pengadilan.create')
            ->breadcrumbs(function (Trail $trail, Pengadilan $pengadilan) {
                $trail->parent('admin.cluster_5.pengadilan.index', $pengadilan)
                    ->push(
                        __('Ubah Pengadilan DIY'),
                        route('admin.cluster_5.pengadilan.edit', $pengadilan)
                    );
            });
    });
});
