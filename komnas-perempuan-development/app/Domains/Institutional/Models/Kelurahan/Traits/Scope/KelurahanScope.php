<?php

namespace App\Domains\Institutional\Models\Kelurahan\Traits\Scope;

/**
 * Class KelurahanScope.
 */
trait KelurahanScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('kalurahan_kelurahan', 'ILIKE', "%{$term}%");
    }
}
