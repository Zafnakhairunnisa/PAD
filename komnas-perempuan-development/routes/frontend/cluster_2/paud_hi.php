<?php

use App\Domains\Institutional\Http\Controllers\Frontend\PaudHI\PaudHIController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_2.paud_hi'.
Route::group([
    'prefix' => 'klaster-ii/paud-hi',
    'as' => 'cluster_2.paud_hi.',
], function () {
    // All route names are prefixed with 'frontend.cluster_2.paud_hi'.
    Route::get('/', [PaudHIController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster II'))
                ->push(
                    __('Paud HI'),
                    route('frontend.cluster_2.paud_hi.index')
                );
        });
});
