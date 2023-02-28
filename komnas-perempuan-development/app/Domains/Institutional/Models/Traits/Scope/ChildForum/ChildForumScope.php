<?php

namespace App\Domains\Institutional\Models\Traits\Scope\ChildForum;

/**
 * Class ChildForumScope.
 */
trait ChildForumScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('nama', 'ILIKE', "%{$term}%")
                    ->orWhere('tingkat', 'ILIKE', "%{$term}%")
                    ->orWhere('surat_keputusan', 'ILIKE', "%{$term}%")
                    ->orWhere('waktu_pembentukan', 'ILIKE', "%{$term}%")
                    ->orWhere('nama_ketua', 'ILIKE', "%{$term}%")
                    ->orWhere('nomor_telepon', 'ILIKE', "%{$term}%")
                    ->orWhere('kalurahan', 'ILIKE', "%{$term}%")
                    ->orWhere('kapanewon', 'ILIKE', "%{$term}%")
                    ->orWhere('kabupaten', 'ILIKE', "%{$term}%");
    }
}
