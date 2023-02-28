<?php

use App\Domains\Institutional\Http\Controllers\Backend\ChildForum\ChildForumRecapitulationController;
use App\Domains\Institutional\Models\ChildForumRecapitulation;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.child_forum.recapitulation.'.
Route::group([
    'prefix' => 'kelembagaan/forum-anak/rekapitulasi',
    'as' => 'institutional.child_forum.recapitulation.',
], function () {
    Route::get('/', [ChildForumRecapitulationController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.institutional.child_forum.recapitulation|admin.institutional.child_forum.recapitulation.list|admin.institutional.child_forum.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Forum Anak'), route('admin.institutional.child_forum.index'))
                ->push(__('Rekapitulasi'), route('admin.institutional.child_forum.recapitulation.index'));
        });

    Route::get('create', [ChildForumRecapitulationController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_forum.recapitulation.index')
                ->push(__('Buat Rekapitulasi Forum Anak'), route('admin.institutional.child_forum.recapitulation.create'));
        });
    Route::post('/', [ChildForumRecapitulationController::class, 'store'])->name('store');

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', [ChildForumRecapitulationController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, ChildForumRecapitulation $recapitulation) {
                $trail->parent('admin.institutional.child_forum.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Forum Anak'), route('admin.institutional.child_forum.recapitulation.edit', $recapitulation));
            });

        Route::patch('/', [ChildForumRecapitulationController::class, 'update'])->name('update');
        Route::delete('/', [ChildForumRecapitulationController::class, 'destroy'])->name('destroy');
    });
});
