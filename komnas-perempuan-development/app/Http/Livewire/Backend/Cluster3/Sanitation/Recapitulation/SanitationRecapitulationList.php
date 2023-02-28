<?php

namespace App\Http\Livewire\Backend\Cluster3\Sanitation\Recapitulation;

use App\Http\Livewire\Backend\Cluster3\Sanitation\Traits\WithSanitationRecapitulationService;
use Livewire\Component;

class SanitationRecapitulationList extends Component
{
    use WithSanitationRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi air bersih dan sanitasi.')
            );

        return redirect()
            ->route('admin.cluster_3.sanitation.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.sanitation.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
