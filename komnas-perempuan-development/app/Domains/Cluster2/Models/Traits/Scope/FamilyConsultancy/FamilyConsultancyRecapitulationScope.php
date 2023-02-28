<?php

namespace App\Domains\Cluster2\Models\Traits\Scope\FamilyConsultancy;

/**
 * Class FamilyConsultancyRecapitulationScope.
 */
trait FamilyConsultancyRecapitulationScope
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
                    });
    }
}
