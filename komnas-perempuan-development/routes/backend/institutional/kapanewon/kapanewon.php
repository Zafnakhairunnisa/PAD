<?php

use App\Domains\Institutional\Models\Kapanewon\Kapanewon;
use App\Http\Livewire\Backend\Institutional\Kapanewon\KapanewonCreateForm;
use App\Http\Livewire\Backend\Institutional\Kapanewon\KapanewonList;
use App\Http\Livewire\Backend\Institutional\Kapanewon\KapanewonUpdateForm;
use App\Http\Livewire\Backend\Institutional\Kapanewon\KapanewonImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.institutional.kapanewon'.
Route::group([
    'prefix' => 'institutional/kapanewon',
    'as' => 'institutional.kapanewon.',
], function () {
    Route::get('/', KapanewonList::class)
        ->name('index')
        ->middleware('permission:admin.institutional.kapanewon|admin.institutional.kapanewon.list|admin.institutional.kapanewon.create|admin.institutional.kapanewon.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(
                    __('Kapanewon'),
                    route('admin.institutional.kapanewon.index')
                );
        });

    Route::get('create', KapanewonCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.institutional.kapanewon.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.kapanewon.index')
                ->push(
                    __('Buat Kapanewon'),
                    route('admin.institutional.kapanewon.create')
                );
        });

    Route::get('import', KapanewonImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.kapanewon.index')
                ->push(__('Impor Kapanewon'), route('admin.institutional.kapanewon.import'));
        });

    Route::group(['prefix' => '{kapanewon}'], function () {
        Route::get('edit', KapanewonUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.institutional.kapanewon.create')
            ->breadcrumbs(function (Trail $trail, Kapanewon $kapanewon) {
                $trail->parent('admin.institutional.kapanewon.index', $kapanewon)
                    ->push(
                        __('Ubah Kapanewon'),
                        route('admin.institutional.kapanewon.edit', $kapanewon)
                    );
            });
    });
});
