<?php

namespace App\Domains\Cluster5\Models\Bprs;

use App\Domains\Cluster5\Models\Bprs\Traits\Scope\BprsScope;
use App\Models\File;
use App\Models\Model;

class Bprs extends Model
{
    use BprsScope;

    protected static $logName = 'bprs';

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
