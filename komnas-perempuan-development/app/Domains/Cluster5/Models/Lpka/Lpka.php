<?php

namespace App\Domains\Cluster5\Models\Lpka;

use App\Domains\Cluster5\Models\Lpka\Traits\Scope\LpkaScope;
use App\Models\File;
use App\Models\Model;

class Lpka extends Model
{
    use LpkaScope;

    protected static $logName = 'lpka';

    protected $fillable = [
        'alamat',
        'daftar_sop',
        'jenis_ruangan',
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
