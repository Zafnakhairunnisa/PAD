<?php

use App\Domains\Cluster5\Models\Bapas\Bapas;
use App\Http\Livewire\Backend\Cluster5\Bapas\BapasCreateForm;
use App\Http\Livewire\Backend\Cluster5\Bapas\BapasList;
use App\Http\Livewire\Backend\Cluster5\Bapas\BapasUpdateForm;
use App\Http\Livewire\Backend\Cluster5\Bapas\BapasImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.bapas'.
Route::group([
    'prefix' => 'klaster-5/bapas',
    'as' => 'cluster_5.bapas.',
], function () {
    Route::get('/', BapasList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.bapas|admin.cluster_5.bapas.list|admin.cluster_5.bapas.create|admin.cluster_5.bapas.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster V'))
                ->push(
                    __('Balai Pemasyarakatan'),
                    route('admin.cluster_5.bapas.index')
                );
        });

    Route::get('create', BapasCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.bapas.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.bapas.index')
                ->push(
                    __('Buat Balai Pemasyarakatan'),
                    route('admin.cluster_5.bapas.create')
                );
        });

    Route::get('import', BapasImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.bapas.index')
                ->push(__('Impor Balai Pemasyarakatan'), route('admin.cluster_5.bapas.import'));
        });

    Route::group(['prefix' => '{bapas}'], function () {
        Route::get('edit', BapasUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.bapas.create')
            ->breadcrumbs(function (Trail $trail, Bapas $bapas) {
                $trail->parent('admin.cluster_5.bapas.index', $bapas)
                    ->push(
                        __('Ubah Balai Pemasyarakatan'),
                        route('admin.cluster_5.bapas.edit', $bapas)
                    );
            });
    });
});
