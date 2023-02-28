<?php

namespace App\Http\Livewire\Backend\Cluster3\MedicalFacility;

use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits\WithMedicalFacilityService;
use Livewire\Component;

class MedicalFacilityList extends Component
{
    use WithMedicalFacilityService;

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
                __('Berhasil menghapus fasilitas kesehatan ramah anak.')
            );

        return redirect()
            ->route('admin.cluster_3.medical_facility.index');
    }

    public function render()
    {
        return view('backend.cluster_3.medical_facility.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
