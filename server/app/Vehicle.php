<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Vehicle extends Eloquent
{
    protected $with = ['manufacturer', 'model'];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function model()
    {
        return $this->belongsTo(Model::class);
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }


    public function getTypeAttribute($value)
    {
        return ucfirst($value);
    }

    public function getUsageAttribute($value)
    {
        return ucfirst($value);
    }

    public function getTransmissionAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFuelTypeAttribute($value)
    {
        return ucfirst($value);
    }

    public function getColourAttribute($value)
    {
        $pieces = preg_split('/(?=[A-Z])/', $value);
        return implode(' ', array_filter($pieces));
    }
}
