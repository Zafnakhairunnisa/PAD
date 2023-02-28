<?php

namespace App\Domains\Cluster4\Models\PusatKreatifitasAnak\Traits\Scope;

/**
 * Class PusatKreatifitasAnakScope.
 */
trait PusatKreatifitasAnakScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('nama', 'ILIKE', "%{$term}%")
                    ->where('bidang', 'ILIKE', "%{$term}%")
                    ->where('alamat', 'ILIKE', "%{$term}%")
                    ->where('kalurahan', 'ILIKE', "%{$term}%")
                    ->where('kapanewon', 'ILIKE', "%{$term}%")
                    ->where('legalitas', 'ILIKE', "%{$term}%")
                    ->where('papan_nama', 'ILIKE', "%{$term}%")
                    ->where('pelatihan_kha', 'ILIKE', "%{$term}%")
                    ->where('kegiatan', 'ILIKE', "%{$term}%")
                    ->where('prestasi', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    });
    }
}
