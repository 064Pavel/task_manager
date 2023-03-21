<?php

namespace App\Http\Controllers\TaskInfo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetCountTaskCategoryController extends Controller
{
    public function __invoke()
    {
        $categories = Category::all()->count();
        $response = [];

        $from = today();
        $to = Carbon::tomorrow();


        for($i=1; $i<$categories+1; $i++){
            $item = Task::where('user_id', Auth::id())->whereBetween('deadline', [$from, $to])->where('is_completed', false)->where('category_id', $i)->count();
            $response[] = $item;
        }

        return response()->json($response);


    }
}
