<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class);
    }
}
