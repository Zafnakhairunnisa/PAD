<?php

namespace App\Http\Livewire\Backend\Cluster5\PerlindunganKhususAnak;

use App\Domains\Cluster5\Exports\PerlindunganKhususAnak\PerlindunganKhususAnakTemplateExport;
use App\Domains\Cluster5\Imports\PerlindunganKhususAnak\PerlindunganKhususAnakImport;
use Excel;
use Illuminate\Support\Facades\Bus;
use Livewire\Component;
use Livewire\WithFileUploads;

class PerlindunganKhususAnakImportForm extends Component
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
            new PerlindunganKhususAnakTemplateExport,
            __('Template Import Perlingungan Khusus Anak').'.xlsx'
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

            Excel::import(new PerlindunganKhususAnakImport, $this->importFilePath, 'local');
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
        return view('backend.cluster_5.perlindungan_khusus_anak.import')
                ->extends('backend.layouts.app')
                ->section('content');
    }
}
