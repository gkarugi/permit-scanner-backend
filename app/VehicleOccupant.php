<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehicleOccupant extends Model
{
    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }
}
