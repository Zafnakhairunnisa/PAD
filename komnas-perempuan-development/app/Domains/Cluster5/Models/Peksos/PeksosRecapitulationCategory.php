<?php

namespace App\Domains\Cluster5\Models\Peksos;

use App\Models\Model;

class PeksosRecapitulationCategory extends Model
{
    protected static $logName = 'peksos_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
