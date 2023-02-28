<?php

use App\Domains\Institutional\Http\Controllers\Backend\ChildForum\ChildForumController;
use App\Domains\Institutional\Models\ChildForum;
use App\Http\Livewire\Backend\Institutional\ChildForum\ChildForumImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.institutional'.
Route::group([
    'prefix' => 'kelembagaan/forum-anak',
    'as' => 'institutional.child_forum.',
], function () {
    Route::get('/', [ChildForumController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.institutional.child_forum|admin.institutional.child_forum.list|admin.institutional.child_forum.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Forum Anak'), route('admin.institutional.child_forum.index'));
        });

    Route::get('create', [ChildForumController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_forum.index')
                ->push(__('Buat Forum Anak'), route('admin.institutional.child_forum.create'));
        });

    Route::get('/import', ChildForumImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_forum.index')
                ->push(__('Impor Forum Anak'), route('admin.institutional.child_forum.import'));
        });
    Route::post('/', [ChildForumController::class, 'store'])->name('store');

    Route::group(['prefix' => '{childForum}'], function () {
        Route::get('edit', [ChildForumController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, ChildForum $childForum) {
                $trail->parent('admin.institutional.child_forum.index', $childForum)
                    ->push(__('Ubah Forum Anak'), route('admin.institutional.child_forum.edit', $childForum));
            });

        Route::patch('/', [ChildForumController::class, 'update'])->name('update');
        Route::delete('/', [ChildForumController::class, 'destroy'])->name('destroy');
    });
});
