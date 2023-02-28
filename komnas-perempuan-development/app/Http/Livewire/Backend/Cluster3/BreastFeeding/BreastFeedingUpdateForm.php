<?php

namespace App\Http\Livewire\Backend\Cluster3\BreastFeeding;

use App\Domains\Cluster3\Models\BreastFeeding\BreastFeeding;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits\WithBreastFeedingRules;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits\WithBreastFeedingService;
use Livewire\Component;

class BreastFeedingUpdateForm extends Component
{
    use WithBreastFeedingRules,
        WithBreastFeedingService;

    public BreastFeeding $breastFeeding;

    public function mount()
    {
        $this->nama = $this->breastFeeding->nama;
        $this->no_telepon = $this->breastFeeding->no_telepon;
        $this->lembaga = $this->breastFeeding->lembaga;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->breastFeeding, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah pemberian air susu ibu.')
            );

        return redirect()->route('admin.cluster_3.breast_feeding.index');
    }

    public function render()
    {
        return view('backend.cluster_3.breast_feeding.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
