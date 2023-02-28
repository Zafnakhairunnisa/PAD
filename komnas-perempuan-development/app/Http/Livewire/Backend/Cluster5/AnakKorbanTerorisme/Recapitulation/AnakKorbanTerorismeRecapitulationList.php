<?php

namespace App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\AnakKorbanTerorisme\Traits\WithAnakKorbanTerorismeRecapitulationService;
use Livewire\Component;

class AnakKorbanTerorismeRecapitulationList extends Component
{
    use WithAnakKorbanTerorismeRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi anak korban terorisme dan radikalisme.')
            );

        return redirect()
            ->route('admin.cluster_5.anak_korban_terorisme.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.anak_korban_terorisme.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
