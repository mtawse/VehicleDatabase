<?php

namespace App\Http\Controllers;

use App\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index()
    {
        return response()->json(Vehicle::all(), 200);
    }


    public function show(Vehicle $vehicle)
    {
        return response()->json($vehicle->with('owner')->get(), 200);
    }
}
