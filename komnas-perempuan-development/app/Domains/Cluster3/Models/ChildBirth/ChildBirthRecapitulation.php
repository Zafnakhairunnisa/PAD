<?php

namespace App\Domains\Cluster3\Models\ChildBirth;

use App\Domains\Cluster3\Models\ChildBirth\Traits\Scope\ChildBirthRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster3\ChildBirthRecapitulationFactory;

class ChildBirthRecapitulation extends Model
{
    use ChildBirthRecapitulationScope;

    protected static $logName = 'child_birth';

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
        return ChildBirthRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
