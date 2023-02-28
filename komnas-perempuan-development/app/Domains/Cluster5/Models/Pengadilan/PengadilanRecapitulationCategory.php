<?php

namespace App\Domains\Cluster5\Models\Pengadilan;

use App\Models\Model;

class PengadilanRecapitulationCategory extends Model
{
    protected static $logName = 'pengadilan_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
