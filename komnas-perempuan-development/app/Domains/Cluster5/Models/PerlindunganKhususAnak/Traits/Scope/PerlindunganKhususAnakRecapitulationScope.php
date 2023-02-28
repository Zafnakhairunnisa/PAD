<?php

namespace App\Domains\Cluster5\Models\PerlindunganKhususAnak\Traits\Scope;

/**
 * Class PerlindunganKhususAnakRecapitulationScope.
 */
trait PerlindunganKhususAnakRecapitulationScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('year', 'ILIKE', "%{$term}%")
                    ->where('gender', 'ILIKE', "%{$term}%")
                    ->orWhereHas('location', function ($query) use ($term) {
                        $query->where('locations.name', 'ilike', '%'.$term.'%');
                    });
    }
}
