<?php

namespace App\Domains\Cluster4\Models\PusatKreatifitasAnak\Traits\Scope;

/**
 * Class PusatKreatifitasAnakRecapitulationScope.
 */
trait PusatKreatifitasAnakRecapitulationScope
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
