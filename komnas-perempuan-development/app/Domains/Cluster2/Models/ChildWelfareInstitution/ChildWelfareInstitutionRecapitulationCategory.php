<?php

namespace App\Domains\Cluster2\Models\ChildWelfareInstitution;

use App\Models\Model;
use Database\Factories\ChildWelfareInstitution\ChildWelfareInstitutionRecapitulationCategoryFactory;

class ChildWelfareInstitutionRecapitulationCategory extends Model
{
    protected $table = 'child_welfare_institution_recapitulation_categories';

    protected static $logName = 'child_welfare_institution_recapitulation_category';

    protected $fillable = ['name'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildWelfareInstitutionRecapitulationCategoryFactory::new();
    }
}
