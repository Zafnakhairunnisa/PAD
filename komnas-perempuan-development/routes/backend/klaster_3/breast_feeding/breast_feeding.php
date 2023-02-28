<?php

use App\Domains\Cluster3\Models\BreastFeeding\BreastFeeding;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\BreastFeedingCreateForm;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\BreastFeedingList;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\BreastFeedingUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_3.breast_feeding'.
Route::group([
    'prefix' => 'klaster-3/pemberian-asi',
    'as' => 'cluster_3.breast_feeding.',
], function () {
    Route::get('/', BreastFeedingList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_3.breast_feeding|admin.cluster_3.breast_feeding.list|admin.cluster_3.breast_feeding.create|admin.cluster_3.breast_feeding.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster III'))
                ->push(__('Pemberian Air Susu Ibu'), route('admin.cluster_3.breast_feeding.index'));
        });

    Route::get('create', BreastFeedingCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_3.breast_feeding.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.breast_feeding.index')
                ->push(__('Buat Pemberian Air Susu Ibu'), route('admin.cluster_3.breast_feeding.create'));
        });

    Route::group(['prefix' => '{breastFeeding}'], function () {
        Route::get('edit', BreastFeedingUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_3.breast_feeding.create')
            ->breadcrumbs(function (Trail $trail, BreastFeeding $breastFeeding) {
                $trail->parent('admin.cluster_3.breast_feeding.index', $breastFeeding)
                    ->push(__('Ubah Pemberian Air Susu Ibu'), route('admin.cluster_3.breast_feeding.edit', $breastFeeding));
            });
    });
});
