<?php

namespace App\Domains\Institutional\Models\Traits\Scope\ChildCareOrganization;

/**
 * Class ChildCareOrganizationScope.
 */
trait ChildCareOrganizationScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('nama', 'ILIKE', "%{$term}%")
                    ->orWhere('nama_pimpinan', 'ILIKE', "%{$term}%")
                    ->orWhere('nomor_telepon', 'ILIKE', "%{$term}%")
                    ->orWhere('kalurahan', 'ILIKE', "%{$term}%")
                    ->orWhere('kapanewon', 'ILIKE', "%{$term}%")
                    ->orWhere('kabupaten', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    });
    }
}
