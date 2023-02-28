<?php

namespace App\Domains\Cluster5\Models\Patbm;

use App\Domains\Cluster5\Models\Patbm\Traits\Scope\PatbmScope;
use App\Models\File;
use App\Models\Model;

class Patbm extends Model
{
    use PatbmScope;

    protected static $logName = 'patbm';

    protected $fillable = [
        'nama',
        'tahun',
        'alamat',
        'kelurahan',
        'kapanewon',
        'kabupaten',
        'medsos',
        'ketua',
        'no_telp',
        'fasilitas',
        'kegiatan',
        'prestasi',
    ];

    public function images()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'images');
    }

    public function documents()
    {
        return $this->morphMany(File::class, 'fileable')->where('category', 'documents');
    }
}
