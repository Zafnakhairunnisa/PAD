<?php

namespace App\Domains\Institutional\Models\Traits\Scope\SatgasPPA;

/**
 * Class SatgasPPAScope.
 */
trait SatgasPPAScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('name', 'ILIKE', "%{$term}%")
                    ->orWhere('kelurahan', 'ILIKE', "%{$term}%")
                    ->orWhere('kemantren', 'ILIKE', "%{$term}%")
                    ->orWhere('kabupaten', 'ILIKE', "%{$term}%")
                    ->orWhere('nomor', 'ILIKE', "%{$term}%");
    }
}
