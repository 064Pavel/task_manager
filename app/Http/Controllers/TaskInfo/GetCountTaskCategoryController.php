<?php

namespace App\Http\Controllers\TaskInfo;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GetCountTaskCategoryController extends Controller
{
    public function __invoke($id)
    {
        return Task::where('user_id', Auth::id())->where('category_id', $id)->count();
    }
}
