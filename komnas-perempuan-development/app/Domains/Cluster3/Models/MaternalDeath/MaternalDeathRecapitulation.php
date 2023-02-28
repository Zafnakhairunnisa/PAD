<?php

namespace App\Domains\Cluster3\Models\MaternalDeath;

use App\Domains\Cluster3\Models\MaternalDeath\Traits\Scope\MaternalDeathRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster3\MaternalDeathRecapitulationFactory;

class MaternalDeathRecapitulation extends Model
{
    use MaternalDeathRecapitulationScope;

    protected static $logName = 'maternal_death';

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
        return MaternalDeathRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
