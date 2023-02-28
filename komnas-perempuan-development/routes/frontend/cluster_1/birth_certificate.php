<?php

use App\Domains\Institutional\Http\Controllers\Frontend\BirthCertificate\BirthCertificateController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_1.birth_certificate'.
Route::group([
    'prefix' => 'klaster-i/akta-kelahiran',
    'as' => 'cluster_1.birth_certificate.',
], function () {
    // All route names are prefixed with 'frontend.cluster_1.birth_certificate'.
    Route::get('/', [BirthCertificateController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster II'))
                ->push(__('Akta Kelahiran'), route('frontend.cluster_1.birth_certificate.index'));
        });
});
