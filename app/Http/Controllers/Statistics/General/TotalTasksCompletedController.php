<?php

namespace App\Http\Controllers\Statistics\General;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TotalTasksCompletedController extends Controller
{
    public function __invoke() : JsonResponse
    {
        $total_tasks_completed = Task::where('is_completed', true)->count();
        return response()->json($total_tasks_completed);
    }
}
