<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function store(StoreRequest $request) : TaskResource
    {
        $data = $request->validated();

        $task = Task::create($data);
        return new TaskResource($task);
    }
}
