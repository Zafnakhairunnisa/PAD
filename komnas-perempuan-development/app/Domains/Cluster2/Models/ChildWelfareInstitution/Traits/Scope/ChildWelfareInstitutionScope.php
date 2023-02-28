<?php

namespace App\Domains\Cluster2\Models\ChildWelfareInstitution\Traits\Scope;

/**
 * Class ChildWelfareInstitutionScope.
 */
trait ChildWelfareInstitutionScope
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
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    });
    }
}
