<?php

namespace App\Domains\Cluster4\Models\RumahIbadahRamahAnak;

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\Traits\Scope\RumahIbadahRamahAnakScope;
use App\Models\Location;
use App\Models\Model;
use Database\Factories\Cluster4\RumahIbadahRamahAnak\RumahIbadahRamahAnakFactory;

class RumahIbadahRamahAnak extends Model
{
    use RumahIbadahRamahAnakScope;

    protected static $logName = 'rumah_ibadah_ramah_anak';

    protected $fillable = [
        'nama',
        'jenis',
        'alamat',
        'kalurahan',
        'kapanewon',
        'location_id',
        'ruang_bermain',
        'pojok_bacaan',
        'kawasan_tanpa_rokok',
        'layanan_ramah_anak',
        'kegiatan_kreatif',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
