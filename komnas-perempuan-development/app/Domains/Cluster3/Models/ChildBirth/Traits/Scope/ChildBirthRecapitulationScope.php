<?php

namespace App\Domains\Cluster3\Models\ChildBirth\Traits\Scope;

/**
 * Class ChildBirthRecapitulationScope.
 */
trait ChildBirthRecapitulationScope
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
