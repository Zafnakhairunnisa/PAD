<?php

namespace App\Domains\Cluster5\Models\PolisiDiy\Traits\Scope;

/**
 * Class PolisiDiyScope.
 */
trait PolisiDiyScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('daftar_sop', 'ILIKE', "%{$term}%")
                    ->where('fasilitas', 'ILIKE', "%{$term}%")
                    ->where('alamat', 'ILIKE', "%{$term}%");
    }
}
