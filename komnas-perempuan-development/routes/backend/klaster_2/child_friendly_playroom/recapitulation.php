<?php

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroomRecapitulation;
use App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom\Recapitulation\ChildFriendlyPlayroomRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom\Recapitulation\ChildFriendlyPlayroomRecapitulationList;
use App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom\Recapitulation\ChildFriendlyPlayroomRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_2.child_friendly_playroom.recapitulation'.
Route::group([
    'prefix' => 'klaster-2/ruang-bermain-ramah-anak/rekapitulasi',
    'as' => 'cluster_2.child_friendly_playroom.recapitulation.',
], function () {
    Route::get('/', ChildFriendlyPlayroomRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_2.child_friendly_playroom.recapitulation|admin.cluster_2.child_friendly_playroom.recapitulation.list|admin.cluster_2.child_friendly_playroom.recapitulation.create|admin.cluster_2.child_friendly_playroom.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster II'))
                ->push(__('Ruang Bermain Ramah Anak'), route('admin.cluster_2.child_friendly_playroom.index'))
                ->push(__('Rekapitulasi Ruang Bermain Ramah Anak'), route('admin.cluster_2.child_friendly_playroom.recapitulation.index'));
        });

    Route::get('create', ChildFriendlyPlayroomRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_2.child_friendly_playroom.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.child_friendly_playroom.recapitulation.index')
                ->push(__('Buat Rekapitulasi Ruang Bermain Ramah Anak'), route('admin.cluster_2.child_friendly_playroom.recapitulation.create'));
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', ChildFriendlyPlayroomRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_2.child_friendly_playroom.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, ChildFriendlyPlayroomRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_2.child_friendly_playroom.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Ruang Bermain Ramah Anak'), route('admin.cluster_2.child_friendly_playroom.recapitulation.edit', $recapitulation));
            });
    });
});
