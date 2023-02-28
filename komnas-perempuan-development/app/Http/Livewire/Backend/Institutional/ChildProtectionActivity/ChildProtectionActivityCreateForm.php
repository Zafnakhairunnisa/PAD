<?php

namespace App\Http\Livewire\Backend\Institutional\ChildProtectionActivity;

use App\Domains\Institutional\Services\ChildProtectionActivityService;
use App\Domains\Institutional\Services\ChildProtectionActivitySourceOfFundsService;
use App\Domains\Institutional\Services\ChildProtectionActivityTypeService;
use Livewire\Component;
use Livewire\WithFileUploads;

class ChildProtectionActivityCreateForm extends Component
{
    use WithFileUploads;

    private ChildProtectionActivityService $childProtectionActivityService;

    /**
     * @var ChildProtectionActivitySourceOfFundsService
     */
    private ChildProtectionActivitySourceOfFundsService $childProtectionActivitySourceOfFundsService;

    private ChildProtectionActivityTypeService $childProtectionActivityTypeService;

    public $company_name;

    public $source_of_fund_id;

    public $activity_name;

    public $activity_type_id;

    public $target;

    public $budget;

    public $year;

    public $location_id;

    public $documents = [];

    public $images = [];

    protected $rules = [
        'company_name' => 'required|string',
        'source_of_fund_id' => 'required|exists:child_protection_activity_source_of_funds,id',
        'activity_name' => 'required|string',
        'activity_type_id' => 'required|exists:child_protection_activity_types,id',
        'target' => 'required|string',
        'budget' => 'required|string',
        'year' => 'required|max:4',
        'location_id' => 'required|exists:locations,id',
        'documents.*' => 'mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel',
        'images.*' => 'mimetypes:image/jpg,image/jpeg,image/png',
    ];

    protected $validationAttributes = [
        'company_name' => 'Nama lembaga/opd/ldsm/perusahaan',
        'source_of_fund_id' => 'Sumber dana',
        'activity_name' => 'Nama kegiatan',
        'activity_type_id' => 'Jenis kegiatan',
        'target' => 'Sasaran',
        'budget' => 'Anggaran',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }

    public function boot(
        ChildProtectionActivityService $childProtectionActivityService,
        ChildProtectionActivityTypeService $childProtectionActivityTypeService,
        ChildProtectionActivitySourceOfFundsService $childProtectionActivitySourceOfFundsService)
    {
        $this->childProtectionActivityService = $childProtectionActivityService;
        $this->childProtectionActivityTypeService = $childProtectionActivityTypeService;
        $this->childProtectionActivitySourceOfFundsService = $childProtectionActivitySourceOfFundsService;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->childProtectionActivityService->store($validated);

        session()->flash('flash_success', __('Berhasil membuat kegiatan perlindungan anak.'));

        return redirect()->route('admin.institutional.child_protection_activity.index');
    }

    public function render()
    {
        $sourceOfFunds = $this->childProtectionActivitySourceOfFundsService->all();
        $activityTypes = $this->childProtectionActivityTypeService->all();

        return view('backend.institutional.child_protection_activity.create', [
            'sourceOfFunds' => $sourceOfFunds,
            'activityTypes' => $activityTypes,
        ])
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
