<?php

namespace App\Http\Livewire\Backend\Cluster3\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\MedicalFacility;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits\WithMedicalFacilityRules;
use App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits\WithMedicalFacilityService;
use Livewire\Component;

class MedicalFacilityUpdateForm extends Component
{
    use WithMedicalFacilityRules,
        WithMedicalFacilityService;

    public MedicalFacility $medicalFacility;

    public function mount()
    {
        $this->nama = $this->medicalFacility->nama;
        $this->surat_keterangan = $this->medicalFacility->surat_keterangan;
        $this->year = $this->medicalFacility->year;
        $this->category_id = $this->medicalFacility->category_id;
        $this->alamat = $this->medicalFacility->alamat;
        $this->kalurahan = $this->medicalFacility->kalurahan;
        $this->kapanewon = $this->medicalFacility->kapanewon;
        $this->location_id = $this->medicalFacility->location_id;
        $this->provinsi = $this->medicalFacility->provinsi;
        $this->sdm_terlatih = $this->medicalFacility->sdm_terlatih;
        $this->pusat_informasi = $this->medicalFacility->pusat_informasi;
        $this->ruang_pelayanan = $this->medicalFacility->ruang_pelayanan;
        $this->ruang_bermain_ramah_anak = $this->medicalFacility->ruang_bermain_ramah_anak;
        $this->ruang_laktasi = $this->medicalFacility->ruang_laktasi;
        $this->kawasan_tanpa_rokok = $this->medicalFacility->kawasan_tanpa_rokok;
        $this->sanitasi_sesuai_standar = $this->medicalFacility->sanitasi_sesuai_standar;
        $this->sarpras_ramah_disabilitas = $this->medicalFacility->sarpras_ramah_disabilitas;
        $this->cakupan_bayi = $this->medicalFacility->cakupan_bayi;
        $this->pelayanan_konseling = $this->medicalFacility->pelayanan_konseling;
        $this->tata_laksana = $this->medicalFacility->tata_laksana;
        $this->jumlah_anak = $this->medicalFacility->jumlah_anak;
        $this->informasi_hak_anak = $this->medicalFacility->informasi_hak_anak;
        $this->mekanisme_suara_anak = $this->medicalFacility->mekanisme_suara_anak;
        $this->pelayanan_penjangkauan = $this->medicalFacility->pelayanan_penjangkauan;
    }

    public function submit()
    {
        $validated = $this->validate();
        $this->service->update($this->breastFeeding, $validated);

        session()
            ->flash(
                'flash_success',
                __('Berhasil mengubah fasilitas kesehatan ramah anak.')
            );

        return redirect()->route('admin.cluster_3.medical_facility.index');
    }

    public function render()
    {
        return view('backend.cluster_3.medical_facility.edit')
            ->extends('backend.layouts.app')
            ->section('content');
    }
}
