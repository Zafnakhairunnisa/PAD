<?php

namespace App\Domains\Cluster2\Models;

use App\Domains\Cluster2\Models\Traits\Scope\FamilyConsultancy\FamilyConsultancyRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster2\FamilyConsultancy\FamilyConsultancyRecapitulationFactory;

class FamilyConsultancyRecapitulation extends Model
{
    use FamilyConsultancyRecapitulationScope;

    protected static $logName = 'family_consultancy_recapitulation';

    protected $fillable = [
        'category',
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
        return FamilyConsultancyRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
