<?php

use App\Domains\Cluster5\Http\Controllers\Frontend\AnakKorbanTerorisme\AnakKorbanTerorismeController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
Route::group([
    'prefix' => 'klaster-v/anak-korban-terorisme',
    'as' => 'cluster_5.anak_korban_terorisme.',
], function () {
    // All route names are prefixed with 'frontend.cluster_3.air_bersih_dan_sanitasi'.
    Route::get('/', [AnakKorbanTerorismeController::class, 'index'])
        ->name('index')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('frontend.index')
                ->push(__('Klaster V'))
                ->push(
                    __('Anak Korban Terorisme dan Radikalisme'),
                    route('frontend.cluster_5.anak_korban_terorisme.index')
                );
        });
});
