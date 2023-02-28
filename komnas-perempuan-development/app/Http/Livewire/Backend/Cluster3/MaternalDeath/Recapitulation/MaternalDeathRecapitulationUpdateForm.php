<?php

namespace App\Http\Livewire\Backend\Cluster3\MaternalDeath\Recapitulation;

use App\Domains\Cluster3\Models\MaternalDeath\MaternalDeathRecapitulation;
use App\Domains\Cluster3\Services\MaternalDeath\MaternalDeathRecapitulationService;
use Livewire\Component;

class MaternalDeathRecapitulationUpdateForm extends Component
{
    private MaternalDeathRecapitulationService $service;

    public MaternalDeathRecapitulation $recapitulation;

    public $year;

    public $value;

    public $location_id;

    protected $validationAttributes = [
        'value' => 'Nilai',
    ];

    protected function rules()
    {
        return [
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
        MaternalDeathRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }

    public function mount()
    {
        $this->value = $this->recapitulation->value;
        $this->year = $this->recapitulation->year;
        $this->location_id = $this->recapitulation->location_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->recapitulation, $validated);

        session()->flash('flash_success', __('Berhasil mengubah rekapitulasi kematian ibu melahirkan.'));

        return redirect()->route('admin.cluster_3.maternal_death.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_3.maternal_death.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
