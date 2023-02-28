<?php

namespace App\Domains\Cluster2\Models\ChildWelfareInstitution;

use App\Domains\Cluster2\Models\ChildWelfareInstitution\Traits\Scope\ChildWelfareInstitutionRecapitulationScope;
use App\Models\Model;
use Database\Factories\Cluster2\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulationFactory;

class ChildWelfareInstitutionRecapitulation extends Model
{
    use ChildWelfareInstitutionRecapitulationScope;

    protected static $logName = 'child_welfare_institution_recapitulation';

    protected $fillable = [
        'category_id',
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
        return ChildWelfareInstitutionRecapitulationFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }

    public function category()
    {
        return $this->belongsTo(ChildWelfareInstitutionRecapitulationCategory::class, 'category_id');
    }
}
