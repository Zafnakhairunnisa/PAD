<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution\Recapitulation;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulation;
use App\Domains\Cluster2\Services\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulationService;
use Livewire\Component;

class ChildWelfareInstitutionRecapitulationUpdateForm extends Component
{
    private ChildWelfareInstitutionRecapitulationService $service;

    public ChildWelfareInstitutionRecapitulation $recapitulation;

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
            'category_id' => 'required|string|exists:child_welfare_institution_recapitulation_categories,id',
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
        ChildWelfareInstitutionRecapitulationService $recapitulationService
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

        session()->flash('flash_success', __('Berhasil mengubah rekapitulasi lembaga kesejahteraan sosial anak.'));

        return redirect()->route('admin.cluster_2.child_welfare_institution.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.child_welfare_institution.recapitulation.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
