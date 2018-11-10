<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;
use App\Http\Resources\VehicleResource;

class VehicleController extends Controller
{
    public function index()
    {
        return VehicleResource::collection(Vehicle::all());
    }


    public function show(Vehicle $vehicle)
    {
        $vehicle = Vehicle::with('owner')->find($vehicle->id);
        return new VehicleResource($vehicle);
    }
}
