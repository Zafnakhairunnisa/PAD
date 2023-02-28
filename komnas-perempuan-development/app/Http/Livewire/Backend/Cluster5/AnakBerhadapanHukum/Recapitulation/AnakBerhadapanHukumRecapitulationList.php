<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\AnakBerhadapanHukum\Traits\WithAnakBerhadapanHukumRecapitulationService;
use Livewire\Component;

class AnakBerhadapanHukumRecapitulationList extends Component
{
    use WithAnakBerhadapanHukumRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi anak berhadapan dengan hukum.')
            );

        return redirect()
            ->route('admin.cluster_5.anak_berhadapan_hukum.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.anak_berhadapan_hukum.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
