<?php

namespace App\Domains\Cluster5\Models\Peksos;

use App\Domains\Cluster5\Models\Peksos\Traits\Scope\PeksosScope;
use App\Models\File;
use App\Models\Model;

class Peksos extends Model
{
    use PeksosScope;

    protected static $logName = 'peksos';

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
