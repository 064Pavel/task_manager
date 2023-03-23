<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function destroy($id)
    {
        $task = Task::where('id', $id)->first();
        $task->delete();
        return response()->json('Task deleted');

    }
}
