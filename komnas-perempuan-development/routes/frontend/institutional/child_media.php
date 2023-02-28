<?php

use App\Domains\Institutional\Http\Controllers\Frontend\ChildMedia\ChildMediaController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.institutional.child_media'.
Route::group([
    'prefix' => 'kelembagaan/media-massa-sahabat-anak',
    'as' => 'institutional.child_media.',
], function () {
    // All route names are prefixed with 'frontend.institutional.child_media'.
    Route::get('/', [ChildMediaController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Kelembagaan'))
                ->push(__('Satgas PPA'), route('frontend.institutional.child_media.index'));
        });
    Route::get('/{slug}/dokumen', [ChildMediaController::class, 'document'])
        ->name('document')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.child_media.index')
                ->push(__('Data Dokumen'));
        });
    Route::get('/{slug}/foto', [ChildMediaController::class, 'image'])
        ->name('image')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.child_media.index')
                ->push(__('Data Foto'));
        });
});
