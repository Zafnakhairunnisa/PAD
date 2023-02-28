<?php

namespace App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Recapitulation;

use App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak\Traits\WithPerlindunganKhususAnakRecapitulationService;
use Livewire\Component;

class PerlindunganKhususAnakRecapitulationList extends Component
{
    use WithPerlindunganKhususAnakRecapitulationService;

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
                __('Berhasil menghapus rekapitulasi perlindungan khusus anak.')
            );

        return redirect()
            ->route('admin.cluster_5.perlindungan_khusus_anak.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_5.perlindungan_khusus_anak.recapitulation.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
