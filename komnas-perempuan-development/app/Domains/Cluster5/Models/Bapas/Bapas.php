<?php

namespace App\Domains\Cluster5\Models\Bapas;

use App\Domains\Cluster5\Models\Bapas\Traits\Scope\BapasScope;
use App\Models\File;
use App\Models\Model;

class Bapas extends Model
{
    use BapasScope;

    protected static $logName = 'bapas';

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
