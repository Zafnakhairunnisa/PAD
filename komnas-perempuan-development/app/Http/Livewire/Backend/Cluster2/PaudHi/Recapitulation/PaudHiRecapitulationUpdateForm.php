<?php

namespace App\Http\Livewire\Backend\Cluster2\PaudHi\Recapitulation;

use App\Domains\Cluster2\Models\PaudHi\PaudHiCategory;
use App\Domains\Cluster2\Models\PaudHi\PaudHiRecapitulation;
use App\Domains\Cluster2\Services\PaudHi\PaudHiRecapitulationService;
use Livewire\Component;

class PaudHiRecapitulationUpdateForm extends Component
{
    private PaudHiRecapitulationService $service;

    public PaudHiRecapitulation $recapitulation;

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
            'category_id' => 'required|exists:paud_hi_categories,id',
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
        PaudHiRecapitulationService $recapitulationService
    ) {
        $this->service = $recapitulationService;
    }

    public function mount()
    {
        $this->category_id = $this->recapitulation->category_id;
        $this->value = $this->recapitulation->value;
        $this->year = $this->recapitulation->year;
        $this->location_id = $this->recapitulation->location_id;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->recapitulation, $validated);

        session()->flash('flash_success', __('Berhasil mengubah rekapitulasi Paud Hi.'));

        return redirect()->route('admin.cluster_2.paud_hi.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.paud_hi.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
