<?php

namespace App\Domains\Cluster5\Models\Pengadilan\Traits\Scope;

/**
 * Class PengadilanScope.
 */
trait PengadilanScope
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
