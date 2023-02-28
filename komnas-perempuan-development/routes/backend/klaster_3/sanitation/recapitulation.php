<?php

use App\Domains\Cluster3\Models\Sanitation\SanitationRecapitulation;
use App\Http\Livewire\Backend\Cluster3\Sanitation\Recapitulation\SanitationRecapitulationCreateForm;
use App\Http\Livewire\Backend\Cluster3\Sanitation\Recapitulation\SanitationRecapitulationList;
use App\Http\Livewire\Backend\Cluster3\Sanitation\Recapitulation\SanitationRecapitulationUpdateForm;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.cluster_3.sanitation.recapitulation'.
Route::group([
    'prefix' => 'klaster-3/air-bersih-dan-sanitasi/rekapitulasi',
    'as' => 'cluster_3.sanitation.recapitulation.',
], function () {
    Route::get('/', SanitationRecapitulationList::class)
        ->name('index')
        ->middleware('permission:admin.cluster_3.sanitation.recapitulation|admin.cluster_3.sanitation.recapitulation.list|admin.cluster_3.sanitation.recapitulation.create|admin.cluster_3.sanitation.recapitulation.delete')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.dashboard')
                ->push(__('Klaster III'))
                ->push(__('Air Bersih dan Sanitasi'))
                ->push(
                    __('Rekapitulasi Air Bersih dan Sanitasi'),
                    route('admin.cluster_3.sanitation.recapitulation.index')
                );
        });

    Route::get('create', SanitationRecapitulationCreateForm::class)
        ->name('create')
        ->middleware('permission:admin.cluster_3.sanitation.recapitulation.create')
        ->breadcrumbs(function (Trail $trail) {
            $trail->parent('admin.cluster_3.sanitation.recapitulation.index')
                ->push(
                    __('Buat Rekapitulasi Air Bersih dan Sanitasi'),
                    route('admin.cluster_3.sanitation.recapitulation.create')
                );
        });

    Route::group(['prefix' => '{recapitulation}'], function () {
        Route::get('edit', SanitationRecapitulationUpdateForm::class)
            ->name('edit')
            ->middleware('permission:admin.cluster_3.sanitation.recapitulation.create')
            ->breadcrumbs(function (Trail $trail, SanitationRecapitulation $recapitulation) {
                $trail->parent('admin.cluster_3.sanitation.recapitulation.index', $recapitulation)
                    ->push(
                        __('Ubah Rekapitulasi Air Bersih dan Sanitasi'),
                        route('admin.cluster_3.sanitation.recapitulation.edit', $recapitulation)
                    );
            });
    });
});
