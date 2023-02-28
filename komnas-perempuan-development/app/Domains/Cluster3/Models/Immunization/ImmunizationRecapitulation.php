<?php

namespace App\Domains\Cluster3\Models\Immunization;

use App\Domains\Cluster3\Models\Immunization\Traits\Scope\ImmunizationRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster3\ImmunizationRecapitulationFactory;

class ImmunizationRecapitulation extends Model
{
    use ImmunizationRecapitulationScope;

    protected static $logName = 'child_immunization';

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
        return ImmunizationRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
