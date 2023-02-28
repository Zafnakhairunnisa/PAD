<?php

namespace App\Domains\Cluster4\Models\PusatKreatifitasAnak;

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\Traits\Scope\PusatKreatifitasAnakScope;
use App\Models\Location;
use App\Models\Model;
use Database\Factories\Cluster4\PusatKreatifitasAnak\PusatKreatifitasAnakFactory;

class PusatKreatifitasAnak extends Model
{
    use PusatKreatifitasAnakScope;

    protected static $logName = 'pusat_kreatifitas_anak';

    protected $fillable = [
        'nama',
        'bidang',
        'alamat',
        'kalurahan',
        'kapanewon',
        'location_id',
        'legalitas',
        'papan_nama',
        'pelatihan_kha',
        'kegiatan',
        'prestasi',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PusatKreatifitasAnakFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    public function images()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'images');
    }

    public function documents()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'documents');
    }
}
