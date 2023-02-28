<?php

namespace App\Domains\Cluster1\Models\Traits\Scope\Library;

/**
 * Class LibraryScope.
 */
trait LibraryScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'ILIKE', "%{$term}%");
    }
}
