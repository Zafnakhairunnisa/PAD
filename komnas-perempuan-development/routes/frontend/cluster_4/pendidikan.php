<?php

use App\Domains\Cluster4\Http\Controllers\Frontend\Pendidikan\PendidikanController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_4.education'.
Route::group([
    'prefix' => 'klaster-iv/pendidikan',
    'as' => 'cluster_4.education.',
], function () {
    // All route names are prefixed with 'frontend.cluster_4.education'.
    Route::get('/', [PendidikanController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster IV'))
                ->push(
                    __('Persalinan'),
                    route('frontend.cluster_4.education.index')
                );
        });
});
