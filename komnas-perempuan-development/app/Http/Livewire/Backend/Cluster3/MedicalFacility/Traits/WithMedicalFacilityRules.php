<?php

namespace App\Http\Livewire\Backend\Cluster3\MedicalFacility\Traits;

trait WithMedicalFacilityRules
{
    public $nama;

    public $surat_keterangan;

    public $year;

    public $category_id;

    public $alamat;

    public $kalurahan;

    public $kapanewon;

    public $location_id;

    public $provinsi;

    public $sdm_terlatih;

    public $pusat_informasi;

    public $ruang_pelayanan;

    public $ruang_bermain_ramah_anak;

    public $ruang_laktasi;

    public $kawasan_tanpa_rokok;

    public $sanitasi_sesuai_standar;

    public $sarpras_ramah_disabilitas;

    public $cakupan_bayi;

    public $pelayanan_konseling;

    public $tata_laksana;

    public $jumlah_anak;

    public $informasi_hak_anak;

    public $mekanisme_suara_anak;

    public $pelayanan_penjangkauan;

    protected $validationAttributes = [
        'lembaga' => 'Nama faskes anak',
        'category_id' => 'Kategori',
        'alamat' => 'Alamat / Dusun',
        'provinsi' => 'Provinsi',
        'sdm_terlatih' => 'SDM terlatih KHA',
        'pusat_informasi' => 'Pusat informasi sahabat anak',
        'ruang_pelayanan' => 'Ruang pelayanan dan konseling bagi anak',
        'ruang_bermain_ramah_anak' => 'Ruang bermain ramah anak',
        'ruang_laktasi' => 'Ruang laktasi',
        'kawasan_tanpa_rokok' => 'Kawasan tanpa rokok',
        'sanitasi_sesuai_standar' => 'Sanitasi sesuai standar',
        'sarpras_ramah_disabilitas' => 'Sarana prasarana ramah disabilitas',
        'cakupan_bayi' => 'Cakupan bayi <6 bulan yang mendapat asi ekslusif',
        'pelayanan_konseling' => 'Pelayanan konseling kesehatan peduli remaja (PKPR)',
        'tata_laksana' => 'Tata laksana kasus kekerasan terhadap anak (KTA)',
        'jumlah_anak' => 'Jumlah anak yang mendapatkan layanan kesehatan',
        'informasi_hak_anak' => 'Pusat informasi tentang hak - hak anak atas kesehatan',
        'mekanisme_suara_anak' => 'Mekanisme untuk menampung suara anak',
        'pelayanan_penjangkauan' => 'Pelayanan penjangkauan kesehatan di wilayah sekitar',
    ];

    protected function rules()
    {
        return [
            'nama' => 'required|string',
            'surat_keterangan' => 'required|string',
            'year' => 'required',
            'category_id' => 'required|exists:medical_facility_categories,id',
            'alamat' => 'required|string',
            'kalurahan' => 'required|string',
            'kapanewon' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'provinsi' => 'required|string',
            'sdm_terlatih' => 'required|string',
            'pusat_informasi' => 'required|in:ada,belum_ada',
            'ruang_pelayanan' => 'required|in:ada,belum_ada',
            'ruang_bermain_ramah_anak' => 'required|in:ada,belum_ada',
            'ruang_laktasi' => 'required|in:ada,belum_ada',
            'kawasan_tanpa_rokok' => 'required|in:ada,belum_ada',
            'sanitasi_sesuai_standar' => 'required|in:sesuai,belum_sesuai',
            'sarpras_ramah_disabilitas' => 'required|in:ada,belum_ada',
            'cakupan_bayi' => 'required|string',
            'pelayanan_konseling' => 'required|in:ada,belum_ada',
            'tata_laksana' => 'required|in:ada,belum_ada',
            'jumlah_anak' => 'required|in:ada,belum_ada',
            'informasi_hak_anak' => 'required|in:ada,belum_ada',
            'mekanisme_suara_anak' => 'required|in:ada,belum_ada',
            'pelayanan_penjangkauan' => 'required|string',
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
    }
}
