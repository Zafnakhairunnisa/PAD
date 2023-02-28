<?php

use App\Domains\Cluster1\Models\BirthCertificate;
use App\Http\Livewire\Backend\Cluster1\BirthCertificate\BirthCertificateCreateForm;
use App\Http\Livewire\Backend\Cluster1\BirthCertificate\BirthCertificateList;
use App\Http\Livewire\Backend\Cluster1\BirthCertificate\BirthCertificateUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_1.birth_certificate'.
Route::group([
    'prefix' => 'klaster-1/akta-kelahiran',
    'as' => 'cluster_1.birth_certificate.',
], function () {
    Route::get('/', BirthCertificateList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_1.birth_certificate|admin.cluster_1.birth_certificate.list|admin.cluster_1.birth_certificate.create|admin.cluster_1.birth_certificate.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Kepemilikan Akta Kelahiran'), route('admin.cluster_1.birth_certificate.index'));
        });

    Route::get('create', BirthCertificateCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_1.birth_certificate.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_1.birth_certificate.index')
                ->push(__('Buat Kepemilikan Akta Kelahiran'), route('admin.cluster_1.birth_certificate.create'));
        });

    Route::group(['prefix' => '{birthCertificate}'], function () {
        Route::get('edit', BirthCertificateUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_1.birth_certificate.create')
            ->breadcrumbs(function (Trail $trail, BirthCertificate $birthCertificate) {
                $trail->parent('admin.cluster_1.birth_certificate.index', $birthCertificate)
                    ->push(__('Ubah Kepemilikan Akta Kelahiran'), route('admin.cluster_1.birth_certificate.edit', $birthCertificate));
            });
    });
});
