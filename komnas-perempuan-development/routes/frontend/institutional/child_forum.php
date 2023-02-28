<?php

use App\Domains\Institutional\Http\Controllers\Frontend\ChildForum\ChildForumController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.institutional.child_forum'.
Route::group([
    'prefix' => 'kelembagaan/forum-anak',
    'as' => 'institutional.child_forum.',
], function () {
    // All route names are prefixed with 'frontend.institutional.child_forum'.
    Route::get('/', [ChildForumController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Kelembagaan'))
                ->push(__('Satgas PPA'), route('frontend.institutional.child_forum.index'));
        });
    Route::get('/{slug}/dokumen', [ChildForumController::class, 'document'])
        ->name('document')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.child_forum.index')
                ->push(__('Data Dokumen'));
        });
    Route::get('/{slug}/foto', [ChildForumController::class, 'image'])
        ->name('image')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.child_forum.index')
                ->push(__('Data Foto'));
        });
});
