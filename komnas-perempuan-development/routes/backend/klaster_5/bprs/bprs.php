<?php

use App\Domains\Cluster5\Models\Bprs\Bprs;
use App\Http\Livewire\Backend\Cluster5\Bprs\BprsCreateForm;
use App\Http\Livewire\Backend\Cluster5\Bprs\BprsList;
use App\Http\Livewire\Backend\Cluster5\Bprs\BprsUpdateForm;
use App\Http\Livewire\Backend\Cluster5\Bprs\BprsImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.bprs'.
Route::group([
    'prefix' => 'klaster-5/bprs',
    'as' => 'cluster_5.bprs.',
], function () {
    Route::get('/', BprsList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.bprs|admin.cluster_5.bprs.list|admin.cluster_5.bprs.create|admin.cluster_5.bprs.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster V'))
                ->push(
                    __('Balai Perlindungan dan  Rehabilitasi Sosial Remaja (BPRSR) DIY'),
                    route('admin.cluster_5.bprs.index')
                );
        });

    Route::get('create', BprsCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.bprs.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.bprs.index')
                ->push(
                    __('Buat Balai Perlindungan dan  Rehabilitasi Sosial Remaja (BPRSR) DIY'),
                    route('admin.cluster_5.bprs.create')
                );
        });

    Route::get('import', BprsImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.bprs.index')
                ->push(__('Impor BPRS'), route('admin.cluster_5.bprs.import'));
        });

    Route::group(['prefix' => '{bprs}'], function () {
        Route::get('edit', BprsUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.bprs.create')
            ->breadcrumbs(function (Trail $trail, Bprs $bprs) {
                $trail->parent('admin.cluster_5.bprs.index', $bprs)
                    ->push(
                        __('Ubah Balai Perlindungan dan  Rehabilitasi Sosial Remaja (BPRSR) DIY'),
                        route('admin.cluster_5.bprs.edit', $bprs)
                    );
            });
    });
});
