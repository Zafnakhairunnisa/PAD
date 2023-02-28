<?php

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroom;
use App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom\ChildFriendlyPlayroomCreateForm;
use App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom\ChildFriendlyPlayroomImportForm;
use App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom\ChildFriendlyPlayroomList;
use App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom\ChildFriendlyPlayroomUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_2.child_friendly_playroom'.
Route::group([
    'prefix' => 'klaster-2/ruang-bermain-ramah-anak',
    'as' => 'cluster_2.child_friendly_playroom.',
], function () {
    Route::get('/', ChildFriendlyPlayroomList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_2.child_friendly_playroom|admin.cluster_2.child_friendly_playroom.list|admin.cluster_2.child_friendly_playroom.create|admin.cluster_2.child_friendly_playroom.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster II'))
                ->push(__('Ruang Bermain Ramah Anak'), route('admin.cluster_2.child_friendly_playroom.index'));
        });

    Route::get('create', ChildFriendlyPlayroomCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_2.child_friendly_playroom.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.child_friendly_playroom.index')
                ->push(__('Buat Ruang Bermain Ramah Anak'), route('admin.cluster_2.child_friendly_playroom.create'));
        });

    Route::get('import', ChildFriendlyPlayroomImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_2.child_friendly_playroom.index')
                ->push(__('Impor Ruang Bermain Ramah Anak'), route('admin.cluster_2.child_friendly_playroom.import'));
        });

    Route::group(['prefix' => '{childFriendlyPlayroom}'], function () {
        Route::get('edit', ChildFriendlyPlayroomUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_2.child_friendly_playroom.create')
            ->breadcrumbs(function (Trail $trail, ChildFriendlyPlayroom $childFriendlyPlayroom) {
                $trail->parent('admin.cluster_2.child_friendly_playroom.index', $childFriendlyPlayroom)
                    ->push(__('Ubah Ruang Bermain Ramah Anak'), route('admin.cluster_2.child_friendly_playroom.edit', $childFriendlyPlayroom));
            });
    });
});
