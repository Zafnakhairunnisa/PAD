<?php

namespace App\Http\Livewire\Backend\Cluster2\PaudHi\Recapitulation;

use App\Domains\Cluster2\Models\PaudHi\PaudHiCategory;
use App\Domains\Cluster2\Services\PaudHi\PaudHiRecapitulationService;
use Livewire\Component;

class PaudHiRecapitulationCreateForm extends Component
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
        PaudHiRecapitulationService $familyConsultancyRecapitulationService
    ) {
        $this->service = $familyConsultancyRecapitulationService;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat rekapitulasi Paud HI.'));

        return redirect()->route('admin.cluster_2.paud_hi.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.paud_hi.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
