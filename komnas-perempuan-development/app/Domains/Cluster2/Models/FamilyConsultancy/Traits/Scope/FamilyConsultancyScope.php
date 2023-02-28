<?php

namespace App\Domains\Cluster2\Models\FamilyConsultancy\Traits\Scope;

/**
 * Class FamilyConsultancyScope.
 */
trait FamilyConsultancyScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('nama', 'ILIKE', "%{$term}%")
                    ->orWhere('alamat', 'ILIKE', "%{$term}%")
                    ->orWhere('kalurahan', 'ILIKE', "%{$term}%")
                    ->orWhere('kapanewon', 'ILIKE', "%{$term}%")
                    ->orWhere('nama_pimpinan', 'ILIKE', "%{$term}%")
                    ->orWhere('no_telepon', 'ILIKE', "%{$term}%")
                    ->orWhere('no_sertifikasi', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    })
                    ->orWhereHas('category', function ($query) use ($term) {
                        $query->where(
                            'family_consultancy_categories.name',
                            'ilike',
                            '%'.$term.'%'
                        );
                    });
    }
}
