<?php

namespace App\Http\Livewire\Backend\Institutional\Regulation;

use App\Domains\Institutional\Models\Regulation;
use App\Domains\Institutional\Services\RegulationService;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegulationUpdateForm extends Component
{
    use WithFileUploads;

    protected RegulationService $regulationService;

    public Regulation $regulation;

    public $name;

    public $year;

    public $type;

    public $location_id;

    public $rule_type;

    public $documents = [];

    public $images = [];

    public $existingImages = [];

    public $existingDocuments = [];

    protected $rules = [
        'name' => 'required|string',
        'year' => 'required|string|max:4',
        'rule_type' => 'required',
        'type' => 'required|string',
        'location_id' => 'required',
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

    public function mount(Regulation $regulation)
    {
        $this->regulation = $regulation;

        $this->name = $regulation->name;
        $this->year = $regulation->year;
        $this->type = $regulation->type;
        $this->location_id = $regulation->location_id;
        $this->rule_type = $regulation->rule_type;

        $this->existingImages = $regulation->images->map(function ($image) {
            return mapFilepondImages($image);
        });
        $this->existingDocuments = $regulation->documents->map(function ($document) {
            return mapFilepondDocument($document);
        });
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->regulationService->update($this->regulation, $validated);

        session()->flash('flash_success', __('Berhasil mengubah peraturan dan kebijakan.'));

        return redirect()->route('admin.institutional.regulation.index');
    }

    public function render()
    {
        return view('livewire.backend.regulation.regulation-update-form');
    }
}
