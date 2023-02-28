<?php

namespace App\Domains\Cluster3\Models\MotherAndDaughterCard\Traits\Scope;

/**
 * Class MotherAndDaughterCardRecapitulationScope.
 */
trait MotherAndDaughterCardRecapitulationScope
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
                    });
    }
}
