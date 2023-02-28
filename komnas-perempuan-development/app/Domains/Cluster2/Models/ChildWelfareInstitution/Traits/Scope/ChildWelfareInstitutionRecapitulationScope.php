<?php

namespace App\Domains\Cluster2\Models\ChildWelfareInstitution\Traits\Scope;

/**
 * Class ChildWelfareInstitutionRecapitulationScope.
 */
trait ChildWelfareInstitutionRecapitulationScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('category', 'ILIKE', "%{$term}%")
                    ->orWhere('value', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    })
                    ->orWhereHas('category', function ($query) use ($term) {
                        $query->where('category.name', 'ilike', '%'.$term.'%');
                    });
    }
}
