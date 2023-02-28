<?php

namespace App\Domains\Cluster4\Models\RumahIbadahRamahAnak\Traits\Scope;

/**
 * Class RumahIbadahRamahAnakScope.
 */
trait RumahIbadahRamahAnakScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('nama', 'ILIKE', "%{$term}%")
                    ->where('jenis', 'ILIKE', "%{$term}%")
                    ->where('alamat', 'ILIKE', "%{$term}%")
                    ->where('kalurahan', 'ILIKE', "%{$term}%")
                    ->where('kapanewon', 'ILIKE', "%{$term}%")
                    ->where('ruang_bermain', 'ILIKE', "%{$term}%")
                    ->where('kawasan_tanpa_rokok', 'ILIKE', "%{$term}%")
                    ->where('layanan_ramah_anak', 'ILIKE', "%{$term}%")
                    ->where('pojok_bacaan', 'ILIKE', "%{$term}%")
                    ->where('kegiatan_kreatif', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    });
    }
}
