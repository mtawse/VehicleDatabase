<?php

namespace App\Http\Controllers\Model;

use App\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ModelResource;

class VehicleController extends Controller
{
    public function index(Model $model)
    {
        return new  ModelResource($model->load('vehicles'));
    }
}
