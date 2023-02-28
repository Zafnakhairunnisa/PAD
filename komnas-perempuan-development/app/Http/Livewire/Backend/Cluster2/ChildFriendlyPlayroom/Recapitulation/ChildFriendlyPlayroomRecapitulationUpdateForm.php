<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom\Recapitulation;

use App\Domains\Cluster2\Models\ChildFriendlyPlayroom\ChildFriendlyPlayroomRecapitulation;
use App\Domains\Cluster2\Services\ChildFriendlyPlayroom\ChildFriendlyPlayroomRecapitulationService;
use Livewire\Component;

class ChildFriendlyPlayroomRecapitulationUpdateForm extends Component
{
    private ChildFriendlyPlayroomRecapitulationService $service;

    public ChildFriendlyPlayroomRecapitulation $recapitulation;

    public $category_id;

    public $year;

    public $value;

    public $location_id;

    protected $validationAttributes = [
        'category_id' => 'Kategori',
        'value' => 'Nilai',
    ];

    protected function rules()
    {
        return [
            'category_id' => 'required|string|exists:child_friendly_playroom_categories,id',
            'value' => 'required|numeric',
            'year' => 'required|max:4',
            'location_id' => 'required|exists:locations,id',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(
        ChildFriendlyPlayroomRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }

    public function mount()
    {
        $this->category = $this->recapitulation->category;
        $this->value = $this->recapitulation->value;
        $this->year = $this->recapitulation->year;
        $this->location_id = $this->recapitulation->location_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->recapitulation, $validated);

        session()->flash('flash_success', __('Berhasil mengubah rekapitulasi ruang bermain ramah anak.'));

        return redirect()->route('admin.cluster_2.child_friendly_playroom.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.child_friendly_playroom.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
