<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Permit extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $guarded = [];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'vehicle_id');
    }

    public function scans()
    {
        return $this->hasMany(Scan::class,'permit_id');
    }
}
