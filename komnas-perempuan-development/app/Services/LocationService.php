<?php

namespace App\Services;

use App\Models\Location;
use App\Services\BaseService;

/**
 * Class LocationService.
 */
class LocationService extends BaseService
{
    /**
     * LocationService constructor.
     *
     * @param  Location  $regulation
     */
    public function __construct(Location $regulation)
    {
        $this->model = $regulation;
    }
}
