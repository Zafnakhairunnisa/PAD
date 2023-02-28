<?php

namespace App\Domains\Institutional\Models;

use App\Domains\Institutional\Models\Traits\Scope\ChildCareOrganization\ChildCareOrganizationRecapitulationScope;
use App\Models\Location;
use App\Models\Model;
use Database\Factories\ChildCareOrganization\ChildCareOrganizationRecapitulationFactory;

class ChildCareOrganizationRecapitulation extends Model
{
    use ChildCareOrganizationRecapitulationScope;

    protected static $logName = 'child_care_organization_recapitulation';

    protected $fillable = [
        'year',
        'value',
        'location_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildCareOrganizationRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
