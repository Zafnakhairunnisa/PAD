<?php

namespace App\Domains\Cluster1\Models;

use App\Domains\Cluster1\Models\Traits\Scope\BirthCertificate\BirthCertificateScope;
use App\Models\Model;
use Database\Factories\Cluster1\BirthCertificate\BirthCertificateFactory;

class BirthCertificate extends Model
{
    use BirthCertificateScope;

    protected static $logName = 'birth_certificate';

    protected $generateSlugFrom = 'nama';

    protected $fillable = [
        'category',
        'gender',
        'value',
        'year',
        'location_id',
    ];

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return BirthCertificateFactory::new();
    }

    public function location()
    {
        return $this->belongsTo(\App\Models\Location::class);
    }
}
