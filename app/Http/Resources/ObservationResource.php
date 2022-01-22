<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ObservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap='observation';

    public function toArray($request)
    {
        return [
            'scientist' => new ScientistResource($this->resource->scientist),
            'star' => new StarResource($this->resource->star),
            'coginition' => $this->resource->coginition,
            'new_star' => $this->resource->new_star,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at
        ];
    }
}
