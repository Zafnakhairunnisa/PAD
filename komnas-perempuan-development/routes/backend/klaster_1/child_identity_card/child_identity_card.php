<?php

use App\Domains\Cluster1\Models\ChildIdentityCard;
use App\Http\Livewire\Backend\Cluster1\ChildIdentityCard\ChildIdentityCardCreateForm;
use App\Http\Livewire\Backend\Cluster1\ChildIdentityCard\ChildIdentityCardList;
use App\Http\Livewire\Backend\Cluster1\ChildIdentityCard\ChildIdentityCardUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_1.child_identity_card'.
Route::group([
    'prefix' => 'klaster-1/kepemilikan-kartu-identitas-anak',
    'as' => 'cluster_1.child_identity_card.',
], function () {
    Route::get('/', ChildIdentityCardList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_1.child_identity_card|admin.cluster_1.child_identity_card.list|admin.cluster_1.child_identity_card.create|admin.cluster_1.child_identity_card.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Kepemilikan Kepemilikan Kartu Identitas Anak'), route('admin.cluster_1.child_identity_card.index'));
        });

    Route::get('create', ChildIdentityCardCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_1.child_identity_card.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_1.child_identity_card.index')
                ->push(__('Buat Kepemilikan Kepemilikan Kartu Identitas Anak'), route('admin.cluster_1.child_identity_card.create'));
        });

    Route::group(['prefix' => '{childIdentityCard}'], function () {
        Route::get('edit', ChildIdentityCardUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_1.child_identity_card.create')
            ->breadcrumbs(function (Trail $trail, ChildIdentityCard $childIdentityCard) {
                $trail->parent('admin.cluster_1.child_identity_card.index', $childIdentityCard)
                    ->push(__('Ubah Kepemilikan Kepemilikan Kartu Identitas Anak'), route('admin.cluster_1.child_identity_card.edit', $childIdentityCard));
            });
    });
});
