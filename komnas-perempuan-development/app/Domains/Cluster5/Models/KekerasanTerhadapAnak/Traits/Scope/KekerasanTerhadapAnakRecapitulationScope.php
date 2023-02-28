<?php

namespace App\Domains\Cluster5\Models\KekerasanTerhadapAnak\Traits\Scope;

/**
 * Class KekerasanTerhadapAnakRecapitulationScope.
 */
trait KekerasanTerhadapAnakRecapitulationScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('year', 'ILIKE', "%{$term}%")
                    ->where('gender', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    });
    }
}
