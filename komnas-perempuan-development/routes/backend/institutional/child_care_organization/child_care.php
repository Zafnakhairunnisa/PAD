<?php

use App\Domains\Institutional\Http\Controllers\Backend\ChildCareOrganization\ChildCareOrganizationController;
use App\Domains\Institutional\Models\ChildCareOrganization;
use App\Http\Livewire\Backend\Institutional\ChildCareOrganization\ChildCareOrganizationImportForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.institutional'.
Route::group([
    'prefix' => 'kelembagaan/organisasi-peduli-anak',
    'as' => 'institutional.child_care_organization.',
], function () {
    Route::get('/', [ChildCareOrganizationController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.institutional.child_care_organization|admin.institutional.child_care_organization.list|admin.institutional.child_care_organization.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Organisasi Peduli Anak'), route('admin.institutional.child_care_organization.index'));
        });

    Route::get('create', [ChildCareOrganizationController::class, 'create'])
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_care_organization.index')
                ->push(__('Buat Organisasi Peduli Anak'), route('admin.institutional.child_care_organization.create'));
        });

    Route::get('/import', ChildCareOrganizationImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_care_organization.index')
                ->push(__('Impor Organisasi Peduli Anak'), route('admin.institutional.child_care_organization.import'));
        });
    Route::post('/', [ChildCareOrganizationController::class, 'store'])->name('store');

    Route::group(['prefix' => '{childCareOrganization}'], function () {
        Route::get('edit', [ChildCareOrganizationController::class, 'edit'])
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, ChildCareOrganization $childCareOrganization) {
                $trail->parent('admin.institutional.child_care_organization.index', $childCareOrganization)
                    ->push(__('Ubah Organisasi Peduli Anak'), route('admin.institutional.child_care_organization.edit', $childCareOrganization));
            });

        Route::patch('/', [ChildCareOrganizationController::class, 'update'])->name('update');
        Route::delete('/', [ChildCareOrganizationController::class, 'destroy'])->name('destroy');
    });
});
