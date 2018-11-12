<?php

namespace App\Http\Controllers\Manufacturer;

use App\Manufacturer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ManufacturerResource;

class ModelController extends Controller
{
    public function index(Manufacturer $manufacturer)
    {
        return new  ManufacturerResource($manufacturer->load('models'));
    }
}
