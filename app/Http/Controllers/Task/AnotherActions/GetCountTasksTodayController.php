<?php

namespace App\Http\Controllers\Task\AnotherActions;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskInfo\GetTasksTodayResource;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class GetCountTasksTodayController extends Controller
{
    public function __invoke()
    {
        $count_tasks_today = Task::where('user_id', Auth::id())
            ->where('deadline', today())
            ->where('is_completed', false)
            ->count();
        return $count_tasks_today;
    }


}
