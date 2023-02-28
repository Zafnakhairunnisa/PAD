<?php

use App\Domains\Institutional\Http\Controllers\Frontend\ChildInformationCenter\ChildInformationCenterController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_1.child_information_center'.
Route::group([
    'prefix' => 'klaster-i/pusat-informasi-sahabat-anak',
    'as' => 'cluster_1.child_information_center.',
], function () {
    // All route names are prefixed with 'frontend.cluster_1.child_information_center'.
    Route::get('/', [ChildInformationCenterController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster II'))
                ->push(__('Pusat Informasi Sahabat Anak'), route('frontend.cluster_1.child_information_center.index'));
        });
});
