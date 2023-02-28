<?php

namespace App\Domains\Institutional\Models\Traits\Scope\ChildMedia;

/**
 * Class ChildMediaRecapitulationScope.
 */
trait ChildMediaRecapitulationScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('value', 'ILIKE', "%{$term}%")
            ->orWhereHas('location', function ($query) use ($term) {
                $query->where('locations.name', 'ilike', '%'.$term.'%');
            });
    }
}
