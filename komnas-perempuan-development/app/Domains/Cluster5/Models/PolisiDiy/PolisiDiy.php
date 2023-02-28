<?php

namespace App\Domains\Cluster5\Models\PolisiDiy;

use App\Domains\Cluster5\Models\PolisiDiy\Traits\Scope\PolisiDiyScope;
use App\Models\File;
use App\Models\Model;

class PolisiDiy extends Model
{
    use PolisiDiyScope;

    protected static $logName = 'polisi_diy';

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
