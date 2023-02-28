<?php

namespace App\Domains\Cluster5\Models\Lpka\Traits\Scope;

/**
 * Class LpkaScope.
 */
trait LpkaScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('daftar_sop', 'ILIKE', "%{$term}%")
                    ->where('jenis_ruangan', 'ILIKE', "%{$term}%")
                    ->where('sarana_prasarana', 'ILIKE', "%{$term}%")
                    ->where('alamat', 'ILIKE', "%{$term}%");
    }
}
