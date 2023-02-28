<?php

namespace App\Domains\Cluster3\Models\MedicalFacility\Traits\Scope;

/**
 * Class MedicalFacilityRecapitulationScope.
 */
trait MedicalFacilityRecapitulationScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('year', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    })
                    ->orWhereHas('category', function ($query) use ($term) {
                        $query->where('category.name', 'ilike', '%'.$term.'%');
                    });
    }
}
