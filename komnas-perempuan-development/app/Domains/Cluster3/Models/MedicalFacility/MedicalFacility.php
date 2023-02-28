<?php

namespace App\Domains\Cluster3\Models\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\Traits\Scope\MedicalFacilityScope;
use App\Models\Location;
use App\Models\Model;
use Database\Factories\Cluster3\MedicalFacility\MedicalFacilityFactory;

class MedicalFacility extends Model
{
    use MedicalFacilityScope;

    protected static $logName = 'medical_facility';

    protected $fillable = [
        'nama',
        'surat_keterangan',
        'year',
        'category_id',
        'alamat',
        'kalurahan',
        'kapanewon',
        'location_id',
        'provinsi',
        'sdm_terlatih',
        'pusat_informasi',
        'ruang_pelayanan',
        'ruang_bermain_ramah_anak',
        'ruang_laktasi',
        'kawasan_tanpa_rokok',
        'sanitasi_sesuai_standar',
        'sarpras_ramah_disabilitas',
        'cakupan_bayi',
        'pelayanan_konseling',
        'tata_laksana',
        'jumlah_anak',
        'informasi_hak_anak',
        'mekanisme_suara_anak',
        'pelayanan_penjangkauan',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return MedicalFacilityFactory::new();
    }

    public function category()
    {
        return $this->belongsTo(MedicalFacilityCategory::class, 'category_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
