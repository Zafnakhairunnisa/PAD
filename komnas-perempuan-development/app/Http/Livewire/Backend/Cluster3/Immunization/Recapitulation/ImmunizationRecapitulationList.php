<?php

namespace App\Http\Livewire\Backend\Cluster3\Immunization\Recapitulation;

use App\Domains\Cluster3\Services\Immunization\ImmunizationRecapitulationService;
use Livewire\Component;

class ImmunizationRecapitulationList extends Component
{
    private ImmunizationRecapitulationService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(ImmunizationRecapitulationService $service)
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
            ->flash(
                'flash_success',
                __('Berhasil menghapus rekapitulasi cakupan imunisasi dasar lengkap.')
            );

        return redirect()->route('admin.cluster_2.family_consultancy.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.immunization.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
