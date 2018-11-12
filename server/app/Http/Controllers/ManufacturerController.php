<?php

namespace App\Http\Controllers;

use App\Model;
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
        return new ManufacturerResource($manufacturer->load('models'));
    }

    public function getVehicles(Manufacturer $manufacturer)
    {
        return new ManufacturerResource($manufacturer->load('vehicles'));
    }

}
