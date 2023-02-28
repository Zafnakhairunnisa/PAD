<?php

use App\Domains\Cluster5\Models\Peksos\Peksos;
use App\Http\Livewire\Backend\Cluster5\Peksos\PeksosCreateForm;
use App\Http\Livewire\Backend\Cluster5\Peksos\PeksosList;
use App\Http\Livewire\Backend\Cluster5\Peksos\PeksosUpdateForm;
use App\Http\Livewire\Backend\Cluster5\Peksos\PeksosImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.peksos'.
Route::group([
    'prefix' => 'klaster-5/peksos',
    'as' => 'cluster_5.peksos.',
], function () {
    Route::get('/', PeksosList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.peksos|admin.cluster_5.peksos.list|admin.cluster_5.peksos.create|admin.cluster_5.peksos.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster V'))
                ->push(
                    __('Pekerja Sosial'),
                    route('admin.cluster_5.peksos.index')
                );
        });

    Route::get('create', PeksosCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.peksos.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.peksos.index')
                ->push(
                    __('Buat Pekerja Sosial'),
                    route('admin.cluster_5.peksos.create')
                );
        });

    Route::get('import', PeksosImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.peksos.index')
                ->push(__('Impor Pekerja Sosial'), route('admin.cluster_5.peksos.import'));
        });

    Route::group(['prefix' => '{peksos}'], function () {
        Route::get('edit', PeksosUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.peksos.create')
            ->breadcrumbs(function (Trail $trail, Peksos $peksos) {
                $trail->parent('admin.cluster_5.peksos.index', $peksos)
                    ->push(
                        __('Ubah Pekerja Sosial'),
                        route('admin.cluster_5.peksos.edit', $peksos)
                    );
            });
    });
});
