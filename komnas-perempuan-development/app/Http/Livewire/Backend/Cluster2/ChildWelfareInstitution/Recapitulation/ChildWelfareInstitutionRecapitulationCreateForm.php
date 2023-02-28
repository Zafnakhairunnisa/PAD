<?php

namespace App\Http\Livewire\Backend\Cluster2\ChildWelfareInstitution\Recapitulation;

use App\Domains\Cluster2\Services\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulationService;
use Livewire\Component;

class ChildWelfareInstitutionRecapitulationCreateForm extends Component
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
        ChildWelfareInstitutionRecapitulationService $service
    ) {
        $this->service = $service;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->store($validated);

        session()->flash('flash_success', __('Berhasil membuat rekapitulasi lembaga kesejahteraan sosial anak.'));

        return redirect()->route('admin.cluster_2.child_welfare_institution.recapitulation.index');
    }

    public function render()
    {
        return view('backend.cluster_2.child_welfare_institution.recapitulation.create')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
