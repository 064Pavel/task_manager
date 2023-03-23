<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class GetCategoryController extends Controller
{
    public function __invoke($id)
    {
        $tasks = Category::where('id', $id)->get();
        return response()->json($tasks);
    }
}
