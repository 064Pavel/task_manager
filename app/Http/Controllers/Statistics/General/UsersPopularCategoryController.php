<?php

namespace App\Http\Controllers\Statistics\General;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersPopularCategoryController extends Controller
{
    public function __invoke() : JsonResponse
    {

        $popular_category = DB::table('categories')
                                ->join('tasks', 'categories.id', '=', 'tasks.category_id')
                                ->select("categories.name", DB::raw("COUNT(*) as count"))
                                ->groupBy('categories.name')
                                ->orderBy('count', 'DESC')
                                ->limit(1)
                                ->get();

        return response()->json($popular_category);
    }
}
