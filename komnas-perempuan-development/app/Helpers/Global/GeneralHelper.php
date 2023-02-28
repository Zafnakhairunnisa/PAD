<?php

use Carbon\Carbon;

if (! function_exists('appName')) {
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function appName()
    {
        return config('app.name', 'DP3AP2');
    }
}

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance from a time.
     *
     * @param $time
     * @return Carbon
     *
     * @throws Exception
     */
    function carbon($time)
    {
        return new Carbon($time);
    }
}

if (! function_exists('homeRoute')) {
    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function homeRoute()
    {
        if (auth()->check()) {
            if (auth()->user()->isAdmin()) {
                return 'admin.dashboard';
            }

            if (auth()->user()->isUser()) {
                return 'frontend.user.dashboard';
            }
        }

        return 'frontend.index';
    }
}

if (! function_exists('acceptDocument')) {
    /**
     * Helper to get document accept type on html input
     *
     * @return string
     */
    function acceptDocument()
    {
        return 'application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel';
    }
}

if (! function_exists('mapFilepondImages')) {
    /**
     * Helper to get document accept type on html input
     *
     * @return string
     */
    function mapFilepondImages($image)
    {
        $usingS3 = strtolower(config('filesystems.default')) === 's3';
        $path = url("storage/".$image->path);
        if ($usingS3) {
            $path = \Storage::temporaryUrl($image->path, \Carbon\Carbon::now()->addMinutes(1));
        }
        return [
            'source' => $image->id,
            'options' => [
                'type' => 'local',
                'file' => [
                    'name' => $image->name,
                    'size' => $image->size,
                    'type' => $image->mime,
                ],
                'metadata' => [
                    'poster' => $path,
                ],
            ],
        ];
    }
}

if (! function_exists('mapFilepondDocument')) {
    /**
     * Helper to get document accept type on html input
     *
     * @return string
     */
    function mapFilepondDocument($document)
    {
        return [
            'source' => $document->id,
            'options' => [
                'type' => 'local',
                'file' => [
                    'name' => $document->name,
                    'size' => $document->size,
                    'type' => $document->mime,
                ],
            ],
        ];
    }
}

if (! function_exists('yearRange')) {
    /**
     * Get years in 5 years
     *
     * @return \Illuminate\Support\Collection
     *
     * @throws Exception
     */
    function yearRange($shouldGenerateIfQueryChange = false)
    {
        if ($shouldGenerateIfQueryChange) {
            $queryRequest = request()->query();
            if (isset($queryRequest['from']) && isset($queryRequest['to'])) {
                return generateYearRange($queryRequest['to'], $queryRequest['from']);
            }
        }

        return collect(range(carbon(now())->year, carbon(now())->subYear(4)->year))->reverse()->values();
    }
}

if (! function_exists('generateYearRange')) {
    /**
     * Get years in 5 years
     *
     * @return \Illuminate\Support\Collection
     *
     * @throws Exception
     */
    function generateYearRange($now, $yearAgo)
    {
        return collect(range($now, $yearAgo))->reverse()->values();
    }
}

if (! function_exists('formatCurrency')) {
    /**
     * Get number formatted in Indonesia currency
     *
     * @return \Illuminate\Support\Collection
     *
     * @throws Exception
     */
    function formatCurrency($number)
    {
        return number_format((int) $number, 0, ',', '.');
    }
}

if (! function_exists('removeFormatCurrency')) {
    /**
     * Return number only without format
     *
     * @return \Illuminate\Support\Collection
     *
     * @throws Exception
     */
    function removeFormatCurrency($value)
    {
        return \Str::replace('.', '', $value);
    }
}

if (! function_exists('truncate')) {
    /**
     * Return number only without format
     *
     * @return \Illuminate\Support\Collection
     *
     * @throws Exception
     */
    function truncate($string, $limit = 10)
    {
        return \Str::of($string)->limit($limit);
    }
}

if (! function_exists('oldSelected')) {
    /**
     * Get number formatted in Indonesia currency
     *
     * @return \Illuminate\Support\Collection
     *
     * @throws Exception
     */
    function oldSelected($name, $value, $defaultValue = null)
    {
        return old($name, $defaultValue) === $value ? 'selected' : '';
    }
}
