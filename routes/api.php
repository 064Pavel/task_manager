<?php

use App\Http\Controllers\Category\GetCategoryController;
use App\Http\Controllers\Category\IndexController;
use App\Http\Controllers\CustomTask\ChangeIsCompletedController;
use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\TaskInfo\GetCountTaskCategoryController;
use App\Http\Controllers\TaskInfo\GetCountTasksTodayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('task-manager')->middleware('auth:sanctum')->group(function () {
    Route::get('/categories', IndexController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('tasks', TaskController::class);
});

Route::prefix('task-info')->middleware('auth:sanctum')->group(function () {
    Route::get('/count_tasks_today', GetCountTasksTodayController::class);
    Route::get('/count_tasks_category/{id}', GetCountTaskCategoryController::class);
});


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks/category/{id}', [\App\Http\Controllers\CustomTask\IndexController::class, 'index']);
    Route::get('/category/{id}', GetCategoryController::class);
    Route::patch('/tasks/completed/{id}', ChangeIsCompletedController::class);
});
