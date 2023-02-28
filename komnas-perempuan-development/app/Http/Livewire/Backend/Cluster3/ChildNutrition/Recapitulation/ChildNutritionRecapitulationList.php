<?php

namespace App\Http\Livewire\Backend\Cluster3\ChildNutrition\Recapitulation;

use App\Http\Livewire\Backend\Cluster3\ChildNutrition\Traits\WithChildNutritionRecapitulationService;
use Livewire\Component;

class ChildNutritionRecapitulationList extends Component
{
    use WithChildNutritionRecapitulationService;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function delete($id)
    {
        if (is_array($id) && count($id)) {
            foreach ($id as $selectedKey) {
                $this->service->deleteById($selectedKey);
            }
        } else {
            $this->service->deleteById($id);
        }

        session()
            ->flash(
                'flash_success',
                __('Berhasil menghapus rekapitulasi kematian ibu melahirkan.')
            );

        return redirect()
            ->route('admin.cluster_3.child_nutrition.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.child_nutrition.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
