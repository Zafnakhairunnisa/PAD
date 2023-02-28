<?php

namespace App\Domains\Cluster5\Models\KekerasanTerhadapAnak;

use App\Domains\Cluster5\Models\KekerasanTerhadapAnak\Traits\Scope\KekerasanTerhadapAnakRecapitulationScope;
use App\Models\Model;

class KekerasanTerhadapAnakRecapitulation extends Model
{
    use KekerasanTerhadapAnakRecapitulationScope;

    protected static $logName = 'kekerasan_terhadap_anak';

    protected $fillable = [
        'value',
        'year',
        'location_id',
        'category_id',
        'gender',
    ];

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(KekerasanTerhadapAnakRecapitulationCategory::class);
    }
}
