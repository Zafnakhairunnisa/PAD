<?php

namespace App\Domains\Cluster5\Models\Bapas;

use App\Models\Model;

class BapasRecapitulationCategory extends Model
{
    protected static $logName = 'bapas_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
