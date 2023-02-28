<?php

namespace App\Domains\Cluster5\Models\KekerasanTerhadapAnak;

use App\Models\Model;

class KekerasanTerhadapAnakRecapitulationCategory extends Model
{
    protected static $logName = 'kekerasan_terhadap_anak_rekapitulasi_category';

    protected $fillable = [
        'name',
    ];
}
