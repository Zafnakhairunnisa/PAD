<?php

namespace App\Domains\Cluster3\Models\MotherAndDaughterCard;

use App\Domains\Cluster3\Models\MotherAndDaughterCard\Traits\Scope\MotherAndDaughterCardRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster3\MotherAndDaughterCardRecapitulationFactory;

class MotherAndDaughterCardRecapitulation extends Model
{
    use MotherAndDaughterCardRecapitulationScope;

    protected static $logName = 'mother_and_daughter';

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
        return MotherAndDaughterCardRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
