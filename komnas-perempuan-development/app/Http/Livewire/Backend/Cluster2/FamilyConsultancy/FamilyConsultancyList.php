<?php

namespace App\Http\Livewire\Backend\Cluster2\FamilyConsultancy;

use App\Domains\Cluster2\Services\FamilyConsultancy\FamilyConsultancyService;
use Livewire\Component;

class FamilyConsultancyList extends Component
{
    private FamilyConsultancyService $service;

    protected $listeners = [
        'delete' => 'delete',
    ];

    public function boot(FamilyConsultancyService $service)
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
            ->flash('flash_success', __('Berhasil menghapus lembaga konsultasi keluarga.'));

        return redirect()->route('admin.cluster_2.family_consultancy.index');
    }

    public function render()
    {
        return view('backend.cluster_2.family_consultancy.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
