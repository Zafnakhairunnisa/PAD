<?php

namespace App\Http\Livewire\Backend\Cluster3\BreastFeeding\Recapitulation;

use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits\WithBreastFeedingRecapitulationService;
use Livewire\Component;

class BreastFeedingRecapitulationList extends Component
{
    use WithBreastFeedingRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi pemberian air susu ibu.')
            );

        return redirect()
            ->route('admin.cluster_3.breast_feeding.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.breast_feeding.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
