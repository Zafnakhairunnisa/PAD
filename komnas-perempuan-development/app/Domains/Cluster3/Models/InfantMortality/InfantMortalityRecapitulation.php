<?php

namespace App\Domains\Cluster3\Models\InfantMortality;

use App\Domains\Cluster3\Models\InfantMortality\Traits\Scope\InfantMortalityRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster3\InfantMortalityRecapitulationFactory;

class InfantMortalityRecapitulation extends Model
{
    use InfantMortalityRecapitulationScope;

    protected static $logName = 'infant_mortality';

    protected $fillable = [
        'value',
        'year',
        'location_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return InfantMortalityRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
