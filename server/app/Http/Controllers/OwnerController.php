<?php

namespace App\Http\Controllers;

use App\Owner;
use Illuminate\Http\Request;
use App\Http\Resources\OwnerResource;

class OwnerController extends Controller
{
    public function index()
    {
        return OwnerResource::collection(Owner::all());
    }

    public function show(Owner $owner)
    {
        return new OwnerResource($owner);
    }
}
