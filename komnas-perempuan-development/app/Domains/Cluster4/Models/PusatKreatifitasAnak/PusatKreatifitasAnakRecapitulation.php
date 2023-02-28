<?php

namespace App\Domains\Cluster4\Models\PusatKreatifitasAnak;

use App\Domains\Cluster4\Models\PusatKreatifitasAnak\Traits\Scope\PusatKreatifitasAnakRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster4\PusatKreatifitasAnak\PusatKreatifitasAnakRecapitulationFactory;

class PusatKreatifitasAnakRecapitulation extends Model
{
    use PusatKreatifitasAnakRecapitulationScope;

    protected static $logName = 'pusat_kreatifitas_anak';

    protected $fillable = [
        'value',
        'year',
        'location_id',
        'category_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PusatKreatifitasAnakRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(PusatKreatifitasAnakRecapitulationCategory::class);
    }
}
