<?php

namespace App\Domains\Cluster5\Models\Patbm\Traits\Scope;

/**
 * Class PatbmScope.
 */
trait PatbmScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('nama', 'ILIKE', "%{$term}%");
    }
}
