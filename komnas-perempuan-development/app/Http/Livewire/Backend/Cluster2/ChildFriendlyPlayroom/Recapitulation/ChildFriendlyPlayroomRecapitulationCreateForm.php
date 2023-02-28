<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildFriendlyPlayroom\Recapitulation;

use App\Domains\Cluster2\Services\ChildFriendlyPlayroom\ChildFriendlyPlayroomRecapitulationService;
use Livewire\Component;

class ChildFriendlyPlayroomRecapitulationCreateForm extends Component
{
    private $service;

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
        ChildFriendlyPlayroomRecapitulationService $familyConsultancyRecapitulationService
    ) {
        $this->service = $familyConsultancyRecapitulationService;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat rekapitulasi ruang bermain ramah anak.'));

        return redirect()->route('admin.cluster_2.child_friendly_playroom.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.child_friendly_playroom.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
