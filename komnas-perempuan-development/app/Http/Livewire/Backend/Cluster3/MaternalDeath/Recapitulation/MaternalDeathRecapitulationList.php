<?php

namespace App\Http\Livewire\Backend\Cluster3\MaternalDeath\Recapitulation;

use App\Domains\Cluster3\Services\MaternalDeath\MaternalDeathRecapitulationService;
use Livewire\Component;

class MaternalDeathRecapitulationList extends Component
{
    private MaternalDeathRecapitulationService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(MaternalDeathRecapitulationService $service)
    {
        $this->service = $service;
    }

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
            ->flash('flash_success', __('Berhasil menghapus rekapitulasi kematian ibu melahirkan.'));

        return redirect()->route('admin.cluster_3.maternal_death.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.maternal_death.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
