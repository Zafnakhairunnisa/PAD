<?php

use App\Domains\Institutional\Models\Kelurahan\Kelurahan;
use App\Http\Livewire\Backend\Institutional\Kelurahan\KelurahanCreateForm;
use App\Http\Livewire\Backend\Institutional\Kelurahan\KelurahanList;
use App\Http\Livewire\Backend\Institutional\Kelurahan\KelurahanUpdateForm;
use App\Http\Livewire\Backend\Institutional\Kelurahan\KelurahanImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.institutional.kelurahan'.
Route::group([
    'prefix' => 'institutional/kelurahan',
    'as' => 'institutional.kelurahan.',
], function () {
    Route::get('/', KelurahanList::class)
        ->name('index')
        ->middleware('permission:admin.institutional.kelurahan|admin.institutional.kelurahan.list|admin.institutional.kelurahan.create|admin.institutional.kelurahan.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(
                    __('Kelurahan'),
                    route('admin.institutional.kelurahan.index')
                );
        });

    Route::get('create', KelurahanCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.institutional.kelurahan.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.kelurahan.index')
                ->push(
                    __('Buat Kelurahan'),
                    route('admin.institutional.kelurahan.create')
                );
        });

    Route::get('import', KelurahanImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.kelurahan.index')
                ->push(__('Impor Kelurahan'), route('admin.institutional.kelurahan.import'));
        });

    Route::group(['prefix' => '{kelurahan}'], function () {
        Route::get('edit', KelurahanUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.institutional.kelurahan.create')
            ->breadcrumbs(function (Trail $trail, Kelurahan $kelurahan) {
                $trail->parent('admin.institutional.kelurahan.index', $kelurahan)
                    ->push(
                        __('Ubah Kelurahan'),
                        route('admin.institutional.kelurahan.edit', $kelurahan)
                    );
            });
    });
});
