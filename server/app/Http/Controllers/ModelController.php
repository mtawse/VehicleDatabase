<?php

namespace App\Http\Controllers;

use App\Model;
use Illuminate\Http\Request;
use App\Http\Resources\ModelResource;

class ModelController extends Controller
{
    public function index()
    {
        return ModelResource::collection(Model::all());
    }

    public function show(Model $model)
    {
        return new ModelResource($model);
    }

//    public function getVehicles(Model $model)
//    {
//        return new  ModelResource($model->load('vehicles'));
//    }
}
