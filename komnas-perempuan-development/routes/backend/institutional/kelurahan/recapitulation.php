<?php

use App\Domains\Institutional\Models\Kelurahan\KelurahanRecapitulation;
use App\Http\Livewire\Backend\Institutional\Kelurahan\Recapitulation\KelurahanRecapitulationCreateForm;
use App\Http\Livewire\Backend\Institutional\Kelurahan\Recapitulation\KelurahanRecapitulationList;
use App\Http\Livewire\Backend\Institutional\Kelurahan\Recapitulation\KelurahanRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.institutional.kelurahan.recapitulation'.
Route::group([
    'prefix' => 'institutional/kelurahan/rekapitulasi',
    'as' => 'institutional.kelurahan.recapitulation.',
], function () {
    Route::get('/', KelurahanRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.institutional.kelurahan.recapitulation|admin.institutional.kelurahan.recapitulation.list|admin.institutional.kelurahan.recapitulation.create|admin.institutional.kelurahan.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.kelurahan.index')
                ->push(
                    __('Rekapitulasi'),
                    route('admin.institutional.kelurahan.recapitulation.index')
                );
        });

    Route::get('create', KelurahanRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.institutional.kelurahan.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.kelurahan.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi'),
                    route('admin.institutional.kelurahan.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', KelurahanRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.institutional.kelurahan.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, KelurahanRecapitulation $recapitulation) {
                $trail->parent('admin.institutional.kelurahan.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi'),
                        route('admin.institutional.kelurahan.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
