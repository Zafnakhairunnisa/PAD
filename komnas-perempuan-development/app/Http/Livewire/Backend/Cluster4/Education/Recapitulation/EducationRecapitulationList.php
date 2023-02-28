<?php

namespace App\Http\Livewire\Backend\Cluster4\Education\Recapitulation;

use App\Http\Livewire\Backend\Cluster4\Education\Traits\WithEducationRecapitulationService;
use Livewire\Component;

class EducationRecapitulationList extends Component
{
    use WithEducationRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi pendidikan.')
            );

        return redirect()
            ->route('admin.cluster_4.education.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_4.education.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
