<?php

namespace App\Domains\Cluster5\Models\Bprs\Traits\Scope;

/**
 * Class BprsScope.
 */
trait BprsScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('daftar_sop', 'ILIKE', "%{$term}%")
                    ->where('sarana_prasarana', 'ILIKE', "%{$term}%")
                    ->where('alamat', 'ILIKE', "%{$term}%");
    }
}
