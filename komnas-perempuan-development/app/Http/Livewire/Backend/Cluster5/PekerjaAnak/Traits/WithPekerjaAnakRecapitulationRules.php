<?php

namespace App\Http\Livewire\Backend\Cluster5\PekerjaAnak\Traits;

trait WithPekerjaAnakRecapitulationRules
{
    public $year;

    public $value;

    public $gender;

    public $location_id;

    protected $validationAttributes = [
        'value' => 'Nilai',
    ];

    protected function rules()
    {
        return [
            'value' => 'required|numeric',
            'year' => 'required|max:4',
            'gender' => 'required|in:L,P',
            'location_id' => 'required|exists:locations,id',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }
}
