<?php

namespace App\Http\Controllers\Owner;

use App\Owner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OwnerResource;

class VehicleController extends Controller
{
    public function index(Owner $owner)
    {
        return new  OwnerResource($owner->load('vehicles'));
    }
}
