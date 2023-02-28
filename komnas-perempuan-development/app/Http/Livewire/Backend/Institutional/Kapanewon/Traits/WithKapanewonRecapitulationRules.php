<?php

namespace App\Http\Livewire\Backend\Institutional\Kapanewon\Traits;

trait WithKapanewonRecapitulationRules
{
    public $year;

    public $value;


    public $location_id;

    public $category_id;

    protected $validationAttributes = [
        'value' => 'Nilai',
        'category_id' => 'Kategori',
    ];

    protected function rules()
    {
        return [
            'value' => 'required|numeric',
            'year' => 'required|max:4',
            'location_id' => 'required|exists:locations,id',
            'category_id' => 'required|exists:kapanewon_recapitulation_categories,id',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }
}
