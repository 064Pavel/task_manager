<?php

namespace App\Http\Controllers\Statistics\Personal;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YouHaveCompletedTasksController extends Controller
{
    public function __invoke() : JsonResponse
    {
        $tasks_completed = Task::where('user_id', Auth::id())
                                ->where('is_completed', true)
                                ->count();

        return response()->json($tasks_completed);
    }
}
