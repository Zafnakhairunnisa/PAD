<?php

namespace App\Http\Livewire\Backend\Cluster5\KekerasanTerhadapAnak;

use App\Domains\Cluster5\Exports\KekerasanTerhadapAnak\KekerasanTerhadapAnakTemplateExport;
use App\Domains\Cluster5\Imports\KekerasanTerhadapAnak\KekerasanTerhadapAnakImport;
use Excel;
use Illuminate\Support\Facades\Bus;
use Livewire\Component;
use Livewire\WithFileUploads;

class KekerasanTerhadapAnakImportForm extends Component
{
    use WithFileUploads;

    public $document;

    public $importFile;

    public $importFilePath;

    public $importing = false;

    public $importFinished = false;

    public $importSuccess = false;

    public $importFailed = false;

    public $excelErrors = [];

    protected $rules = [
        'document' => 'required',
    ];

    protected $messages = [
        'document.required' => 'Dokumen impor wajib diisi',
    ];

    public function download()
    {
        return Excel::download(
            new KekerasanTerhadapAnakTemplateExport,
            __('Template Import KekerasanTerhadapAnak').'.xlsx'
        );
    }

    public function getImportBatchProperty()
    {
        if (! $this->batchId) {
            return null;
        }

        return Bus::findBatch($this->batchId);
    }

    public function submit()
    {
        try {
            $this->validate();

            $this->importing = true;
            $this->importFinished = false;
            $this->importFailed = false;
            $this->importSuccess = false;
            $this->errors = [];

            $this->importFilePath = $this->document->store('laravel-excel-import', 'local');

            Excel::import(new KekerasanTerhadapAnakImport, $this->importFilePath, 'local');
            $this->importSuccess = true;
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            $errors = [];
            foreach ($failures as $failure) {
                $errorMessages = [];

                foreach ($failure->errors() as $error) {
                    $errorMessages[] = "{$error} (<strong>{$failure->values()[$failure->attribute()]}</strong>)";
                }

                $errors[] = [
                    'message' => "Terdapat kesalahan pada baris ke {$failure->row()} ",
                    'errors' => $errorMessages,
                ];
            }

            $this->importFailed = true;
            $this->excelErrors = $errors;
        } finally {
            $this->importFinished = true;
            $this->importing = false;
            \Storage::disk('local')->delete($this->importFilePath);
        }
    }

    public function render()
    {
        return view('backend.cluster_5.kekerasan_terhadap_anak.import')
                ->extends('backend.layouts.app')
                ->section('content');
    }
}
