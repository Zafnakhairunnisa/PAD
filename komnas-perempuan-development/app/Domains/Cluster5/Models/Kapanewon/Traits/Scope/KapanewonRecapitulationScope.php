<?php

namespace App\Domains\Cluster5\Models\Kapanewon\Traits\Scope;

/**
 * Class KapanewonRecapitulationScope.
 */
trait KapanewonRecapitulationScope
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
