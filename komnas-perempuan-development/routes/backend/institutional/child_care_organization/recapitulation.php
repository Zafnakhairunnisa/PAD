<?php

use App\Domains\Institutional\Http\Controllers\Backend\ChildCareOrganization\ChildCareOrganizationRecapitulationController;
use App\Domains\Institutional\Models\ChildCareOrganizationRecapitulation;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.child_care_organization.recapitulation.'.
Route::group([
    'prefix' => 'kelembagaan/organisasi-peduli-anak/rekapitulasi',
    'as' => 'institutional.child_care_organization.recapitulation.',
], function () {
    Route::get('/', [ChildCareOrganizationRecapitulationController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.institutional.child_care_organization.recapitulation|admin.institutional.child_care_organization.recapitulation.list|admin.institutional.child_care_organization.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Organisasi Peduli Anak'), route('admin.institutional.child_care_organization.index'))
                ->push(__('Rekapitulasi'), route('admin.institutional.child_care_organization.recapitulation.index'));
        });

    Route::get('create', [ChildCareOrganizationRecapitulationController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_care_organization.recapitulation.index')
                ->push(__('Buat Rekapitulasi Organisasi Peduli Anak'), route('admin.institutional.child_care_organization.recapitulation.create'));
        });
    Route::post('/', [ChildCareOrganizationRecapitulationController::class, 'store'])->name('store');

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', [ChildCareOrganizationRecapitulationController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, ChildCareOrganizationRecapitulation $recapitulation) {
                $trail->parent('admin.institutional.child_care_organization.recapitulation.index', $recapitulation)
                    ->push(__('Ubah Rekapitulasi Organisasi Peduli Anak'), route('admin.institutional.child_care_organization.recapitulation.edit', $recapitulation));
            });

        Route::patch('/', [ChildCareOrganizationRecapitulationController::class, 'update'])->name('update');
        Route::delete('/', [ChildCareOrganizationRecapitulationController::class, 'destroy'])->name('destroy');
    });
});
