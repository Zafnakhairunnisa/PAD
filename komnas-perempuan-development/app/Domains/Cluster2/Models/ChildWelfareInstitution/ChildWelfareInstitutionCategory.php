<?php

namespace App\Domains\Cluster2\Models\ChildWelfareInstitution;

use App\Models\Model;
use Database\Factories\Cluster2\ChildWelfareInstitution\ChildWelfareInstitutionCategoryFactory;

class ChildWelfareInstitutionCategory extends Model
{
    protected static $logName = 'child_welfare_institution_category';

    protected $fillable = ['name'];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return ChildWelfareInstitutionCategoryFactory::new();
    }
}
