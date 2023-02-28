<?php

namespace App\Domains\Cluster4\Models\RumahIbadahRamahAnak;

use App\Domains\Cluster4\Models\RumahIbadahRamahAnak\Traits\Scope\RumahIbadahRamahAnakRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster4\RumahIbadahRamahAnak\RumahIbadahRamahAnakRecapitulationFactory;

class RumahIbadahRamahAnakRecapitulation extends Model
{
    use RumahIbadahRamahAnakRecapitulationScope;

    protected static $logName = 'pusat_kreatifitas_anak';

    protected $fillable = [
        'value',
        'year',
        'location_id',
        'category_id',
    ];

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(RumahIbadahRamahAnakRecapitulationCategory::class);
    }
}
