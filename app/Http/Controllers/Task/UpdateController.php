<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use PHPUnit\Util\Json;

class UpdateController extends Controller
{
    public function update(StoreRequest $request, $id) : JsonResponse
    {
        $data = $request->validated();
        $task = Task::where('id', $id)->first();
        $task->update($data);
        return response()->json('Task update');
    }
}
