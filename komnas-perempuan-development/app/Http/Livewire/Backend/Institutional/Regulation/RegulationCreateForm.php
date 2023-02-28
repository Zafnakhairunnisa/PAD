<?php

namespace App\Http\Livewire\Backend\Institutional\Regulation;

use App\Domains\Institutional\Services\RegulationService;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegulationCreateForm extends Component
{
    use WithFileUploads;

    protected RegulationService $regulationService;

    public $name;

    public $year;

    public $type;

    public $location_id;

    public $documents = [];

    public $images = [];

    public $rule_type;

    protected $rules = [
        'name' => 'required|string',
        'year' => 'required|string|max:4',
        'rule_type' => 'required',
        'type' => 'required|string',
        'location_id' => 'required|string',
        'documents.*' => 'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel',
        'images.*' => 'mimetypes:image/jpg,image/jpeg,image/png',
    ];

    protected $messages = [
        'name.required' => 'Nama peraturan harus diisi.',
        'year.required' => 'Tahun terbit peraturan harus diisi.',
        'rule_type.required' => 'Jenis Peraturan/Kebijakan harus diisi.',
        'rule_type.in' => 'Jenis Peraturan/Kebijakan hanya bisa diisikan dengan yang ada dipilihan.',
        'type.required' => 'Macam Peraturan/Kebijakan harus diisi.',
        'location_id.required' => 'Wilayah harus diisi.',
        'documents.*.mimetypes' => 'Dokumen yang dapat diunggah adalah docx,xlsx,pdf',
        'images.*.mimetypes' => 'Hanya foto yang dapat digunakan',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(RegulationService $regulationService)
    {
        $this->regulationService = $regulationService;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->regulationService->store($validated);

        session()->flash('flash_success', __('Berhasil membuat peraturan dan kebijakan baru.'));

        return redirect()->route('admin.institutional.regulation.index');
    }

    public function render()
    {
        return view('livewire.backend.regulation.regulation-create-form');
    }
}
