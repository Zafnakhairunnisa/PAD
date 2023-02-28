<?php

namespace App\Models\Traits;

use App\Models\Location;

/**
 * Trait Slug.
 */
trait LocationTrait
{
    public function get_locations()
    {
        $locations = Location::select(['id', 'name'])
            ->where('name', '!=', 'Daerah Istimewa Yogyakarta')
            ->get();

        return $locations;
    }
}
