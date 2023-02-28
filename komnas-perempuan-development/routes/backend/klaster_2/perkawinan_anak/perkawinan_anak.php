<?php

use App\Domains\Cluster2\Models\PerkawinanAnak;
use App\Http\Livewire\Backend\Cluster2\PerkawinanAnak\PerkawinanAnakCreateForm;
use App\Http\Livewire\Backend\Cluster2\PerkawinanAnak\PerkawinanAnakList;
use App\Http\Livewire\Backend\Cluster2\PerkawinanAnak\PerkawinanAnakUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_2.perkawinan_anak'.
Route::group([
    'prefix' => 'klaster-2/akta-kelahiran',
    'as' => 'cluster_2.perkawinan_anak.',
], function () {
    Route::get('/', PerkawinanAnakList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_2.perkawinan_anak|admin.cluster_2.perkawinan_anak.list|admin.cluster_2.perkawinan_anak.create|admin.cluster_2.perkawinan_anak.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Perkawinan Anak'), route('admin.cluster_2.perkawinan_anak.index'));
        });

    Route::get('create', PerkawinanAnakCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_2.perkawinan_anak.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.perkawinan_anak.index')
                ->push(__('Buat Perkawinan Anak'), route('admin.cluster_2.perkawinan_anak.create'));
        });

    Route::group(['prefix' => '{birthCertificate}'], function () {
        Route::get('edit', PerkawinanAnakUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_2.perkawinan_anak.create')
            ->breadcrumbs(function (Trail $trail, PerkawinanAnak $birthCertificate) {
                $trail->parent('admin.cluster_2.perkawinan_anak.index', $birthCertificate)
                    ->push(__('Ubah Perkawinan Anak'), route('admin.cluster_2.perkawinan_anak.edit', $birthCertificate));
            });
    });
});
