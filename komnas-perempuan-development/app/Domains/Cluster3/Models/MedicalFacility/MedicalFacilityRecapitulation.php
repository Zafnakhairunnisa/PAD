<?php

namespace App\Domains\Cluster3\Models\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\Traits\Scope\MedicalFacilityRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster3\MedicalFacility\MedicalFacilityRecapitulationFactory;

class MedicalFacilityRecapitulation extends Model
{
    use MedicalFacilityRecapitulationScope;

    protected static $logName = 'medical_facility_recapitulation';

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
        return MedicalFacilityRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(MedicalFacilityRecapitulationCategory::class, 'category_id');
    }
}
