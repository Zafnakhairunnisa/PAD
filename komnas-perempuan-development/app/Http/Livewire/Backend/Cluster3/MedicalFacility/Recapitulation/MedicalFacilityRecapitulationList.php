<?php

namespace App\Http\Livewire\Backend\Cluster3\MedicalFacility\Recapitulation;

use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits\WithMedicalFacilityRecapitulationService;
use Livewire\Component;

class MedicalFacilityRecapitulationList extends Component
{
    use WithMedicalFacilityRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi fasilitas kesehatan ramah anak.')
            );

        return redirect()
            ->route('admin.cluster_3.medical_facility.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.medical_facility.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
