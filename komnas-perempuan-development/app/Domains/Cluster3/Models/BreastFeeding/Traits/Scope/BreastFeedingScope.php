<?php

namespace App\Domains\Cluster3\Models\BreastFeeding\Traits\Scope;

/**
 * Class BreastFeedingScope.
 */
trait BreastFeedingScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('nama', 'ILIKE', "%{$term}%")
            ->orWhere('no_telepon', 'ILIKE', "%{$term}%")
            ->orWhere('lembaga', 'ILIKE', "%{$term}%");
    }
}
