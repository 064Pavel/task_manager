<?php

namespace App\Http\Controllers\Statistics\General;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TotalTasksCreatedController extends Controller
{
    public function __invoke() : JsonResponse
    {
        $total_tasks_created = Task::all()->count();
        return response()->json($total_tasks_created);
    }
}
