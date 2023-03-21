<?php

namespace App\Http\Controllers\CustomTask;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show($id) : TaskResource
    {
        $task = Task::where('id', $id)->first();
        return new TaskResource($task);
    }
}
