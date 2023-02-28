<?php

namespace App\Domains\Cluster3\Models\MedicalFacility\Traits\Scope;

/**
 * Class MedicalFacilityScope.
 */
trait MedicalFacilityScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('nama', 'ILIKE', "%{$term}%")
            ->orWhere('surat_keterangan', 'ILIKE', "%{$term}%")
            ->orWhere('year', 'ILIKE', "%{$term}%")
            ->orWhere('alamat', 'ILIKE', "%{$term}%")
            ->orWhere('kalurahan', 'ILIKE', "%{$term}%")
            ->orWhere('kapanewon', 'ILIKE', "%{$term}%")
            ->orWhereHas('location', function ($query) use ($term) {
                $query->where('locations.name', 'ilike', '%'.$term.'%');
            })
            ->orWhereHas('category', function ($query) use ($term) {
                $query->where('medical_facility_categories.name', 'ilike', '%'.$term.'%');
            });
    }
}
