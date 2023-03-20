<?php

namespace App\Http\Controllers\CustomTask;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index($id)
    {
        $tasks = Task::where('user_id', Auth::id())->where('category_id', $id)->get();
        return TaskResource::collection($tasks);

    }
}
