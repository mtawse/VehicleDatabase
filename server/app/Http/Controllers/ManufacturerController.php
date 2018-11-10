<?php

namespace App\Http\Controllers;

use App\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Resources\ManufacturerResource;

class ManufacturerController extends Controller
{
    public function index()
    {
        return ManufacturerResource::collection(Manufacturer::all());
    }


    public function show(Manufacturer $manufacturer)
    {
        return new ManufacturerResource($manufacturer);
    }


    public function getModels(Manufacturer $manufacturer)
    {
        $manufacturer = Manufacturer::with('models')->find($manufacturer->id);
        return new ManufacturerResource($manufacturer);
    }

    public function getVehicles(Manufacturer $manufacturer)
    {
        return response()->json($manufacturer->with('vehicles')->get(), 200);
    }
}
