<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScanResource extends JsonResource
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
            'user_id' => $this->user_id,
            'location' => $this->location,
            'valid' => (bool) $this->valid,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'vehicle' => [
                'occupants' => new VehicleOccupantCollection($this->permit->vehicle->occupants),
                'reg_no' => $this->permit->vehicle->reg_no,
                'make' => $this->permit->vehicle->make,
                'model' => $this->permit->vehicle->model,
                'color' => $this->permit->vehicle->color,
                'created_at' => (string) $this->permit->vehicle->created_at,
                'updated_at' => (string) $this->permit->vehicle->updated_at,
            ],
            'permit' => [
                'permit_number' => $this->permit->permit_number,
                'valid_from' => $this->permit->valid_from,
                'expires_on' => $this->permit->expires_on,
                'goods_description' => $this->permit->goods_description,
                'origin' => $this->permit->origin,
                'destination' => $this->permit->destination,
                'created_at' => (string) $this->permit->created_at,
                'updated_at' => (string) $this->permit->updated_at,
            ],
        ];
    }
}
