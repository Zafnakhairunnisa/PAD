<?php

use App\Domains\Institutional\Http\Controllers\Frontend\ChildProtectionActivity\ChildProtectionActivityController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.institutional.child_protection_activity'.
Route::group([
    'prefix' => 'kelembagaan/kegiatan-perlindungan-anak',
    'as' => 'institutional.child_protection_activity.',
], function () {
    // All route names are prefixed with 'frontend.institutional.child_protection_activity'.
    Route::get('/', [ChildProtectionActivityController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Kelembagaan'))
                ->push(__('Peraturan dan Kebijakan'), route('frontend.institutional.child_protection_activity.index'));
        });
    Route::get('/{slug}/dokumen', [ChildProtectionActivityController::class, 'document'])
        ->name('document')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.child_protection_activity.index')
                ->push(__('Data Dokumen'));
        });
    Route::get('/{slug}/foto', [ChildProtectionActivityController::class, 'image'])
        ->name('image')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.child_protection_activity.index')
                ->push(__('Data Foto'));
        });
});
