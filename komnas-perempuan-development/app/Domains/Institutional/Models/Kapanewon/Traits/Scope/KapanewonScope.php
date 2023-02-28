<?php

namespace App\Domains\Institutional\Models\Kapanewon\Traits\Scope;

/**
 * Class KapanewonScope.
 */
trait KapanewonScope
{
    /**
     * @param $query
     * @param $term
     * @return mixed
     */
    public function scopeSearch($query, $term)
    {
        return $query->where('kapanewon_kemantren', 'ILIKE', "%{$term}%");
    }
}
