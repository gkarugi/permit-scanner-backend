<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $guarded = [];

    public function occupants()
    {
        return $this->hasMany(VehicleOccupant::class,'vehicle_id');
    }

    public function permit()
    {
        return $this->hasOne(Permit::class,'vehicle_id');
    }
}
