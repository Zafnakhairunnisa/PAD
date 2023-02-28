<?php

namespace App\Domains\Institutional\Models\Traits\Scope;

/**
 * Class RegulationScope.
 */
trait RegulationScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'ILIKE', "%{$term}%")
                    ->orWhere('rule_type', 'ILIKE', "%{$term}%")
                    ->orWhere('type', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    });
    }
}
