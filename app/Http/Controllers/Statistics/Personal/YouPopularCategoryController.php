<?php

namespace App\Http\Controllers\Statistics\Personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class YouPopularCategoryController extends Controller
{
    public function __invoke() : JsonResponse
    {
        $popular_category = DB::table('categories')
            ->join('tasks', 'categories.id', '=', 'tasks.category_id')
            ->select("categories.name", DB::raw("COUNT(*) as count"))
            ->where('user_id', Auth::id())
            ->groupBy('categories.name')
            ->orderBy('count', 'DESC')
            ->limit(1)
            ->get();

        return response()->json($popular_category);
    }
}
