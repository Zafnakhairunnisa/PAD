<?php

namespace App\Domains\Cluster5\Models\Pengadilan;

use App\Domains\Cluster5\Models\Pengadilan\Traits\Scope\PengadilanScope;
use App\Models\File;
use App\Models\Model;

class Pengadilan extends Model
{
    use PengadilanScope;

    protected static $logName = 'pengadilan';

    protected $fillable = [
        'alamat',
        'daftar_sop',
        'sarana_prasarana',
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
