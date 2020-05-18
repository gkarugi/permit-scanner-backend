<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    protected $guarded = [];

    public function scannedBy()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function permit()
    {
        return $this->belongsTo(Permit::class,'permit_id');
    }
}
