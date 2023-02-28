<?php

namespace App\Domains\Cluster5\Models\Kejaksaan;

use App\Domains\Cluster5\Models\Kejaksaan\Traits\Scope\KejaksaanScope;
use App\Models\File;
use App\Models\Model;

class Kejaksaan extends Model
{
    use KejaksaanScope;

    protected static $logName = 'kejaksaan';

    protected $fillable = [
        'alamat',
        'daftar_sop',
        'fasilitas',
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
