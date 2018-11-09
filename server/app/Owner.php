<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

    public function getFullNameAttribute()
    {
        return implode(' ', array_filter([
            $this->salutation,
            $this->first_name,
            $this->initials,
            $this->last_name,
            $this->suffix,
        ]));
    }
}
