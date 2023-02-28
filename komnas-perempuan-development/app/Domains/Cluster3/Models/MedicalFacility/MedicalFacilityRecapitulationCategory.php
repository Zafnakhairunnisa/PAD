<?php

namespace App\Domains\Cluster3\Models\MedicalFacility;

use App\Models\Model;
use Database\Factories\Cluster3\MedicalFacility\MedicalFacilityRecapitulationCategoryFactory;

class MedicalFacilityRecapitulationCategory extends Model
{
    protected static $logName = 'medical_facility_recapitulation_category';

    protected $fillable = [
        'name',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return MedicalFacilityRecapitulationCategoryFactory::new();
    }
}
