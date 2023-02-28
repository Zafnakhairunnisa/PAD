<?php

namespace App\Domains\Institutional\Models\Traits\Scope;

/**
 * Class RegulationRecapitulationScope.
 */
trait RegulationRecapitulationScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('category', 'ILIKE', "%{$term}%");
    }
}
