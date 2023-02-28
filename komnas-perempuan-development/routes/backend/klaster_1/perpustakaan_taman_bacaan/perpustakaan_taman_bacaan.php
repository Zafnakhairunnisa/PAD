<?php

use App\Domains\Cluster1\Models\Library;
use App\Http\Livewire\Backend\Cluster1\Library\LibraryCreateForm;
use App\Http\Livewire\Backend\Cluster1\Library\LibraryList;
use App\Http\Livewire\Backend\Cluster1\Library\LibraryUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_1.library'.
Route::group([
    'prefix' => 'klaster-1/perpustakaan-taman-bacaan',
    'as' => 'cluster_1.library.',
], function () {
    Route::get('/', LibraryList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_1.library|admin.cluster_1.library.list|admin.cluster_1.library.create|admin.cluster_1.library.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Kepemilikan Akta Kelahiran'), route('admin.cluster_1.library.index'));
        });

    Route::get('create', LibraryCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_1.library.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_1.library.index')
                ->push(__('Buat Kepemilikan Akta Kelahiran'), route('admin.cluster_1.library.create'));
        });

    Route::group(['prefix' => '{library}'], function () {
        Route::get('edit', LibraryUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_1.library.create')
            ->breadcrumbs(function (Trail $trail, Library $library) {
                $trail->parent('admin.cluster_1.library.index', $library)
                    ->push(__('Ubah Kepemilikan Akta Kelahiran'), route('admin.cluster_1.library.edit', $library));
            });
    });
});
