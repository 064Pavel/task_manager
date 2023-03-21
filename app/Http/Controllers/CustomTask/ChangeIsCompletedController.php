<?php

namespace App\Http\Controllers\CustomTask;

use App\Http\Controllers\Controller;
use App\Models\Task;

class ChangeIsCompletedController extends Controller
{
    public function __invoke($id)
    {
        $task = Task::where('id', $id)->first();
        $task->is_completed = true;
        $task->save();

        return response()->json('Status task changed');
    }
}
