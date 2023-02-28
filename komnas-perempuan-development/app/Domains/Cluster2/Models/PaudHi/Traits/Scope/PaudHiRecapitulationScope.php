<?php

namespace App\Domains\Cluster2\Models\PaudHi\Traits\Scope;

/**
 * Class PaudHiRecapitulationScope.
 */
trait PaudHiRecapitulationScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('year', 'ILIKE', "%{$term}%")
                    ->orWhere('value', 'ILIKE', "%{$term}%")
                    ->orWhereHas('category', function ($query) use ($term) {
                        $query->where(
                            'paud_hi_categories.name',
                            'ilike',
                            '%'.$term.'%'
                        );
                    });
    }
}
