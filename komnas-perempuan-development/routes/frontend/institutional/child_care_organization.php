<?php

use App\Domains\Institutional\Http\Controllers\Frontend\ChildCareOrganization\ChildCareOrganizationController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.institutional.child_care_organization'.
Route::group([
    'prefix' => 'kelembagaan/organisasi-peduli-anak',
    'as' => 'institutional.child_care_organization.',
], function () {
    // All route names are prefixed with 'frontend.institutional.child_care_organization'.
    Route::get('/', [ChildCareOrganizationController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Kelembagaan'))
                ->push(__('Satgas PPA'), route('frontend.institutional.child_care_organization.index'));
        });
    Route::get('/{slug}/dokumen', [ChildCareOrganizationController::class, 'document'])
        ->name('document')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.child_care_organization.index')
                ->push(__('Data Dokumen'));
        });
    Route::get('/{slug}/foto', [ChildCareOrganizationController::class, 'image'])
        ->name('image')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.institutional.child_care_organization.index')
                ->push(__('Data Foto'));
        });
});
