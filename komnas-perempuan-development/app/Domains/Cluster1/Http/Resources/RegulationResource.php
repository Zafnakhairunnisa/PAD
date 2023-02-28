<?php

namespace App\Domains\Cluster1\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegulationResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'name' => $this->name,
            'year' => $this->year,
            'rule_type' => $this->rule_type,
            'type' => $this->type,
            'location' => $this->location->name ?? '-',
            'images_count' => $this->images_count,
            'documents_count' => $this->documents_count,
        ];
    }
}
