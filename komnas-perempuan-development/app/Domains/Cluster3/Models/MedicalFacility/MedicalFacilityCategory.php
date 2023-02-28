<?php

namespace App\Domains\Cluster3\Models\MedicalFacility;

use App\Domains\Cluster3\Models\MedicalFacility\Traits\Scope\MedicalFacilityScope;
use App\Models\Model;
use Database\Factories\Cluster3\MedicalFacility\MedicalFacilityFactory;

class MedicalFacilityCategory extends Model
{
    use MedicalFacilityScope;

    protected static $logName = 'medical_facility_category';

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
        return MedicalFacilityFactory::new();
    }
}
