<?php

use App\Domains\Institutional\Http\Controllers\Frontend\ChildIdentityCard\ChildIdentityCardController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_1.child_identity_card'.
Route::group([
    'prefix' => 'klaster-i/kartu-identitas-anak',
    'as' => 'cluster_1.child_identity_card.',
], function () {
    // All route names are prefixed with 'frontend.cluster_1.child_identity_card'.
    Route::get('/', [ChildIdentityCardController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster II'))
                ->push(__('Kartu Identitas Anak'), route('frontend.cluster_1.child_identity_card.index'));
        });
});
