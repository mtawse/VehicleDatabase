<?php

namespace App\Http\Resources;

use App\Http\Resources\ModelResource;
use App\Http\Resources\OwnerResource;
use App\Http\Resources\ManufacturerResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'manufacturer' => new ManufacturerResource($this->whenLoaded('manufacturer')),
            'model' => new ModelResource($this->whenLoaded('model')),
            'owner' => new OwnerResource($this->whenLoaded('owner')),
            'type' => $this->type,
            'usage' => $this->usage,
            'license_plate' => $this->license_plate,
            'weight_category' => $this->weight_category,
            'no_seats' => $this->no_seats,
            'has_boot' => $this->has_boot,
            'has_trailer' => $this->has_trailer,
            'transmission' => $this->transmission,
            'colour' => $this->colour,
            'is_hgv' => $this->is_hgv,
            'no_doors' => $this->no_doors,
            'has_sunroof' => $this->has_sunroof,
            'has_gps' => $this->has_gps,
            'no_wheels' => $this->no_wheels,
            'engine_cc' => $this->engine_cc,
            'fuel_type' => $this->fuel_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
