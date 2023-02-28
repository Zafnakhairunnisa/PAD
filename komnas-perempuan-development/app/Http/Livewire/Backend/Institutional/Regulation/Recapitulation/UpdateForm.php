<?php

namespace App\Http\Livewire\Backend\Institutional\Regulation\Recapitulation;

use App\Domains\Institutional\Models\RegulationRecapitulation;
use App\Domains\Institutional\Services\RegulationRecapitulationService;
use Livewire\Component;

class UpdateForm extends Component
{
    protected RegulationRecapitulationService $service;

    public RegulationRecapitulation $recapitulation;

    public $year;

    public $category;

    public $value;

    public $location_id;

    protected $messages = [
        'year.required' => 'Tahun rekapitulasi harus diisi.',
        'category.required' => 'Kategori rekapitulasi peraturan harus diisi.',
        'value.required' => 'Nilai rekapitulasi harus diisi.',
        'location_id.required' => 'Wilayah harus diisi.',
        'location_id.in' => 'Wilayah hanya bisa diisikan dengan yang ada dipilihan.',
    ];

    protected $rules = [
        'year' => 'required',
        'category' => 'required',
        'value' => 'required|numeric',
        'location_id' => ['required', 'exists:locations,id'],
    ];

    public function boot(RegulationRecapitulationService $service)
    {
        $this->service = $service;
    }

    public function mount(RegulationRecapitulation $recapitulation)
    {
        $this->recapitulation = $recapitulation;

        $this->year = $recapitulation->year;
        $this->category = $recapitulation->category;
        $this->value = $recapitulation->value;
        $this->location_id = $recapitulation->location_id;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function submit()
    {
        $data = $this->validate();

        $this->service->update($this->recapitulation, $data);

        session()->flash('flash_success', __('Berhasil mengubah rekapitulasi peraturan dan kebijakan baru.'));

        return redirect()->route('admin.institutional.regulation.recapitulation.index');
    }

    public function render()
    {
        return view('livewire.backend.regulation.recapitulation.update-form');
    }
}
