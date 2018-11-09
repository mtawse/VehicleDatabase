<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Manufacturer extends Eloquent
{
    public function models()
    {
        return $this->hasMany(Model::class);
    }


    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }
}
