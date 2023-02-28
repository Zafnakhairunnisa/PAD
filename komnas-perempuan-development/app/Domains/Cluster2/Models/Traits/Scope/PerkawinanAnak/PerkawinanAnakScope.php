<?php

namespace App\Domains\Cluster2\Models\Traits\Scope\PerkawinanAnak;

/**
 * Class PerkawinanAnakScope.
 */
trait PerkawinanAnakScope
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
                    ->orWhere('gender', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    });
    }
}
