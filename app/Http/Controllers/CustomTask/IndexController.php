<?php

namespace App\Http\Controllers\CustomTask;

use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index($id)
    {
        $from = today();
        $to = Carbon::tomorrow();

        $tasks = Task::where('user_id', Auth::id())
                            ->where('category_id', $id)
                            ->where('is_completed', false)
                            ->whereBetween('deadline', [$from, $to])
                            ->get();

        return TaskResource::collection($tasks);

    }
}
