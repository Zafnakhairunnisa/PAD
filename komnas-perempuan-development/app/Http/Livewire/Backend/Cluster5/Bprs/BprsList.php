<?php

namespace App\Http\Livewire\Backend\Cluster5\Bprs;

use App\Http\Livewire\Backend\Cluster5\Bprs\Traits\WithBprsService;
use Livewire\Component;

class BprsList extends Component
{
    use WithBprsService;

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
                __('Berhasil menghapus balai perlindungan dan rehabilitasi sosial remaja (BPRSR) DIY.')
            );

        return redirect()
            ->route('admin.cluster_5.bprs.index');
    }

    public function render()
    {
        return view('backend.cluster_5.bprs.index')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
