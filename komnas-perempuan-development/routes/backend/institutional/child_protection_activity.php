<?php

use App\Domains\Institutional\Http\Controllers\Backend\ChildProtectionActivity\ChildProtectionActivityController;
use App\Domains\Institutional\Http\Controllers\Backend\ChildProtectionActivity\ChildProtectionActivitySourceOfFundsController;
use App\Domains\Institutional\Http\Controllers\Backend\ChildProtectionIndex\ChildProtectionIndexController;
use App\Domains\Institutional\Models\ChildProtectionActivity;
use App\Domains\Institutional\Models\ChildProtectionActivitySourceOfFunds;
use App\Domains\Institutional\Models\ChildProtectionIndex;
use App\Http\Livewire\Backend\Institutional\ChildProtectionActivity\ChildProtectionActivityCreateForm;
use App\Http\Livewire\Backend\Institutional\ChildProtectionActivity\ChildProtectionActivityImportForm;
use App\Http\Livewire\Backend\Institutional\ChildProtectionActivity\ChildProtectionActivityUpdateForm;
use App\Http\Livewire\Backend\Institutional\ChildProtectionIndex\ChildProtectionIndexCreateForm;
use App\Http\Livewire\Backend\Institutional\ChildProtectionIndex\ChildProtectionIndexUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.institutional'.
Route::group([
    'prefix' => 'institutional/child-protection-activity',
    'as' => 'institutional.child_protection_activity.',
], function () {
    Route::group([
        'prefix' => 'source-of-funds',
        'as' => 'source_of_funds.',
    ], function () {
        // All route names are prefixed with 'admin.institutional.child_protection_activity.source_of_funds'.
        Route::get('/', [ChildProtectionActivitySourceOfFundsController::class, 'index'])
            ->name('index')
            ->middleware('permission:admin.institutional.child_protection_activity.source_of_funds|admin.institutional.child_protection_activity.source_of_funds.list|admin.institutional.child_protection_activity.source_of_funds.delete')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.dashboard')
                    ->push(__('Kelembagaan'))
                    ->push(__('Kegiatan Perlindungan Anak'))
                    ->push(__('Sumber Dana'), route('admin.institutional.child_protection_activity.source_of_funds.index'));
            });

        Route::get('create', [ChildProtectionActivitySourceOfFundsController::class, 'create'])
            ->name('create')
            ->breadcrumbs(function (Trail $trail) {
                $trail->parent('admin.institutional.child_protection_activity.source_of_funds.index')
                    ->push(__('Buat Indeks Perlindungan Anak'), route('admin.institutional.child_protection_activity.source_of_funds.create'));
            });

        Route::post('/', [ChildProtectionActivitySourceOfFundsController::class, 'store'])->name('store');
        // Route::get('/import', [RegulationImportController::class, 'index'])
        //     ->name('import')
        //     ->breadcrumbs(function (Trail $trail) {
        //         $trail->parent('admin.institutional.child_protection_activity.source_of_funds.index')
        //             ->push(__('Impor Indeks Perlindungan Anak'), route('admin.institutional.child_protection_activity.source_of_funds.import'));
        //     });

        Route::group(['prefix' => '{childProtectionActivityFunds}'], function () {
            Route::get('edit', [ChildProtectionActivitySourceOfFundsController::class, 'edit'])
                ->name('edit')
                ->breadcrumbs(function (Trail $trail, ChildProtectionActivitySourceOfFunds $childProtectionActivityFunds) {
                    $trail->parent('admin.institutional.child_protection_activity.source_of_funds.index', $childProtectionActivityFunds)
                        ->push(__('Ubah Indeks Perlindungan Anak'), route('admin.institutional.child_protection_activity.source_of_funds.edit', $childProtectionActivityFunds));
                });

            Route::patch('/', [ChildProtectionActivitySourceOfFundsController::class, 'update'])->name('update');
            Route::delete('/', [ChildProtectionActivitySourceOfFundsController::class, 'destroy'])->name('destroy');
        });
    });

    // All route names are prefixed with 'admin.institutional.child_protection_activity'.
    Route::get('/', [ChildProtectionActivityController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.institutional.child_protection_activity|admin.institutional.child_protection_activity.list|admin.institutional.child_protection_activity.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Indeks Perlindungan Anak'), route('admin.institutional.child_protection_activity.index'));
        });

    Route::get('create', ChildProtectionActivityCreateForm::class)
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_protection_activity.index')
                ->push(__('Buat Kegiatan Perlindungan Anak'), route('admin.institutional.child_protection_activity.create'));
        });

    Route::get('/import', ChildProtectionActivityImportForm::class)
        ->name('import')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_protection_activity.index')
                ->push(__('Impor Kegiatan Perlindungan Anak'), route('admin.institutional.child_protection_activity.import'));
        });

    Route::group(['prefix' => '{childProtectionActivity}'], function () {
        Route::get('edit', ChildProtectionActivityUpdateForm::class)
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, ChildProtectionActivity $childProtectionActivity) {
                $trail->parent('admin.institutional.child_protection_activity.index', $childProtectionActivity)
                    ->push(
                        __('Ubah Kegiatan Perlindungan Anak'),
                        route('admin.institutional.child_protection_activity.edit', $childProtectionActivity));
            });

        Route::delete('/', [ChildProtectionActivityController::class, 'destroy'])->name('destroy');
    });
});
