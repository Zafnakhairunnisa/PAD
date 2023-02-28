<?php

use App\Domains\Institutional\Models\Kapanewon\KapanewonRecapitulation;
use App\Http\Livewire\Backend\Institutional\Kapanewon\Recapitulation\KapanewonRecapitulationCreateForm;
use App\Http\Livewire\Backend\Institutional\Kapanewon\Recapitulation\KapanewonRecapitulationList;
use App\Http\Livewire\Backend\Institutional\Kapanewon\Recapitulation\KapanewonRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.institutional.kapanewon.recapitulation'.
Route::group([
    'prefix' => 'institutional/kapanewon/rekapitulasi',
    'as' => 'institutional.kapanewon.recapitulation.',
], function () {
    Route::get('/', KapanewonRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.institutional.kapanewon.recapitulation|admin.institutional.kapanewon.recapitulation.list|admin.institutional.kapanewon.recapitulation.create|admin.institutional.kapanewon.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.kapanewon.index')
                ->push(
                    __('Rekapitulasi'),
                    route('admin.institutional.kapanewon.recapitulation.index')
                );
        });

    Route::get('create', KapanewonRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.institutional.kapanewon.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.kapanewon.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi'),
                    route('admin.institutional.kapanewon.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', KapanewonRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.institutional.kapanewon.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, KapanewonRecapitulation $recapitulation) {
                $trail->parent('admin.institutional.kapanewon.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi'),
                        route('admin.institutional.kapanewon.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
