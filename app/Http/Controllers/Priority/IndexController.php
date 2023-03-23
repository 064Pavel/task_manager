<?php

namespace App\Http\Controllers\Priority;

use App\Http\Controllers\Controller;
use App\Http\Resources\PriorityResource;
use App\Models\Priority;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return PriorityResource::collection(Priority::all());
    }
}
