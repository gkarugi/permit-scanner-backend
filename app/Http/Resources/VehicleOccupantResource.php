<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleOccupantResource extends JsonResource {
	/**
	 * Transform the resource into an array.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public function toArray($request) {
		return [
			'id' => $this->id,
			'name' => $this->name,
			'reg_document' => $this->reg_document,
			'reg_document_number' => $this->reg_document_number,
			'phone' => $this->phone,
			'email' => $this->email,
			'created_at' => (string) $this->created_at,
			'updated_at' => (string) $this->updated_at,
		];
	}
}
