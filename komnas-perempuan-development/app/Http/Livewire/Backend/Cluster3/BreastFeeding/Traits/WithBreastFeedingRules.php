<?php

namespace App\Http\Livewire\Backend\Cluster3\BreastFeeding\Traits;

trait WithBreastFeedingRules
{
    public $nama;

    public $no_telepon;

    public $lembaga;

    protected $validationAttributes = [
        'lembaga' => 'Nama lembaga',
    ];

    protected function rules()
    {
        return [
            'nama' => 'required|string',
            'no_telepon' => 'required|string',
            'lembaga' => 'required|string',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }
}
