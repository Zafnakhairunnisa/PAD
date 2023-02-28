<?php

use App\Domains\Cluster5\Models\Lpka\Lpka;
use App\Http\Livewire\Backend\Cluster5\Lpka\LpkaCreateForm;
use App\Http\Livewire\Backend\Cluster5\Lpka\LpkaList;
use App\Http\Livewire\Backend\Cluster5\Lpka\LpkaUpdateForm;
use App\Http\Livewire\Backend\Cluster5\Lpka\LpkaImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_5.lpka'.
Route::group([
    'prefix' => 'klaster-5/lpka',
    'as' => 'cluster_5.lpka.',
], function () {
    Route::get('/', LpkaList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_5.lpka|admin.cluster_5.lpka.list|admin.cluster_5.lpka.create|admin.cluster_5.lpka.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster V'))
                ->push(
                    __('Lembaga Pembinaan Khusus Anak Yogyakarta'),
                    route('admin.cluster_5.lpka.index')
                );
        });

    Route::get('create', LpkaCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_5.lpka.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.lpka.index')
                ->push(
                    __('Buat Lembaga Pembinaan Khusus Anak Yogyakarta'),
                    route('admin.cluster_5.lpka.create')
                );
        });

    Route::get('import', LpkaImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_5.lpka.index')
                ->push(__('Impor LPKA'), route('admin.cluster_5.lpka.import'));
        });

    Route::group(['prefix' => '{lpka}'], function () {
        Route::get('edit', LpkaUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_5.lpka.create')
            ->breadcrumbs(function (Trail $trail, Lpka $lpka) {
                $trail->parent('admin.cluster_5.lpka.index', $lpka)
                    ->push(
                        __('Ubah Lembaga Pembinaan Khusus Anak Yogyakarta'),
                        route('admin.cluster_5.lpka.edit', $lpka)
                    );
            });
    });
});
