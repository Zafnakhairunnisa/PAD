<?php

use App\Domains\Institutional\Http\Controllers\Backend\ChildProtectionActivity\ChildProtectionActivityRecapitulationController;
use App\Domains\Institutional\Models\ChildProtectionActivityRecapitulations;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.child_protection_activity.recapitulation.'.
Route::group([
    'prefix' => 'institutional/child-protection-activity/recapitulation',
    'as' => 'institutional.child_protection_activity.recapitulation.',
], function () {
    Route::get('/', [ChildProtectionActivityRecapitulationController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.institutional.child_protection_activity.recapitulation|admin.institutional.child_protection_activity.recapitulation.list|admin.institutional.child_protection_activity.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Kegiatan Perlindungan Anak'), route('admin.institutional.child_protection_activity.index'))
                ->push(__('Rekapitulasi'), route('admin.institutional.child_protection_activity.recapitulation.index'));
        });

    Route::get('create', [ChildProtectionActivityRecapitulationController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_protection_activity.recapitulation.index')
                ->push(__('Buat Rekapitulasi Kegiatan Perlindungan Anak'), route('admin.institutional.child_protection_activity.recapitulation.create'));
        });
    Route::post('/', [ChildProtectionActivityRecapitulationController::class, 'store'])->name('store');

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', [ChildProtectionActivityRecapitulationController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, ChildProtectionActivityRecapitulations $recapitulation) {
                $trail->parent('admin.institutional.child_protection_activity.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Kegiatan Perlindungan Anak'), route('admin.institutional.child_protection_activity.recapitulation.edit', $recapitulation));
            });

        Route::patch('/', [ChildProtectionActivityRecapitulationController::class, 'update'])->name('update');
        Route::delete('/', [ChildProtectionActivityRecapitulationController::class, 'destroy'])->name('destroy');
    });
});
