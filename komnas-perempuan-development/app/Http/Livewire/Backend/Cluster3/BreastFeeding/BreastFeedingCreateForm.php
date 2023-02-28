<?php

namespace App\Http\Livewire\Backend\Cluster3\BreastFeeding;

use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits\WithBreastFeedingRules;
use App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits\WithBreastFeedingService;
use Livewire\Component;

class BreastFeedingCreateForm extends Component
{
    use WithBreastFeedingRules,
        WithBreastFeedingService;

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil membuat pemberian air susu ibu.')
            );

        return redirect()
            ->route('admin.cluster_3.breast_feeding.index');
    }

    public function render()
    {
        return view('backend.cluster_3.breast_feeding.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
