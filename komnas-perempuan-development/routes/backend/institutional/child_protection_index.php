<?php

use App\Domains\Institutional\Http\Controllers\Backend\ChildProtectionIndex\ChildProtectionIndexController;
use App\Domains\Institutional\Models\ChildProtectionIndex;
use App\Http\Livewire\Backend\Institutional\ChildProtectionIndex\ChildProtectionIndexCreateForm;
use App\Http\Livewire\Backend\Institutional\ChildProtectionIndex\ChildProtectionIndexUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.institutional'.
Route::group([
    'prefix' => 'institutional/child-protection-indices',
    'as' => 'institutional.child_protection_index.',
], function () {
    // All route names are prefixed with 'admin.institutional.child_protection_index'.
    Route::get('/', [ChildProtectionIndexController::class, 'index'])
        ->name('index')
        ->middleware('permission:admin.institutional.child_protection_index|admin.institutional.child_protection_index.list|admin.institutional.child_protection_index.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Kelembagaan'))
                ->push(__('Indeks Perlindungan Anak'), route('admin.institutional.child_protection_index.index'));
        });

    Route::get('create', ChildProtectionIndexCreateForm::class)
        ->name('create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.institutional.child_protection_index.index')
                ->push(__('Buat Indeks Perlindungan Anak'), route('admin.institutional.child_protection_index.create'));
        });

    Route::post('/', [ChildProtectionIndexController::class, 'store'])->name('store');
    // Route::get('/import', [RegulationImportController::class, 'index'])
    //     ->name('import')
    //     ->breadcrumbs(function (Trail $trail) {
    //         $trail->parent('admin.institutional.child_protection_index.index')
    //             ->push(__('Impor Indeks Perlindungan Anak'), route('admin.institutional.child_protection_index.import'));
    //     });

    Route::group(['prefix' => '{childProtectionIndex}'], function () {
        Route::get('edit', ChildProtectionIndexUpdateForm::class)
            ->name('edit')
            ->breadcrumbs(function (Trail $trail, ChildProtectionIndex $childProtectionIndex) {
                $trail->parent('admin.institutional.child_protection_index.index', $childProtectionIndex)
                    ->push(__('Ubah Indeks Perlindungan Anak'), route('admin.institutional.child_protection_index.edit', $childProtectionIndex));
            });

        Route::patch('/', [ChildProtectionIndexController::class, 'update'])->name('update');
        Route::delete('/', [ChildProtectionIndexController::class, 'destroy'])->name('destroy');
    });
});
