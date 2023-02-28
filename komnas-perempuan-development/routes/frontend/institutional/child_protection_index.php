<?php

use App\Domains\Institutional\Http\Controllers\Frontend\ChildProtectionIndex\ChildProtectionIndexController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.institutional'.
Route::group([
    'prefix' => 'kelembagaan/indeks-perlindungan-anak',
    'as' => 'institutional.child_protection_index.',
], function () {
    // All route names are prefixed with 'frontend.institutional.child_protection_index'.
    Route::get('/', [ChildProtectionIndexController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Kelembagaan'))
                ->push(__('Peraturan dan Kebijakan'), route('frontend.institutional.child_protection_index.index'));
        });
    Route::get('/export/{type}', [ChildProtectionIndexController::class, 'export'])
        ->name('export');
});
