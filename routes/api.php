<?php

use App\Http\Controllers\Category\GetCategoryController;
use App\Http\Controllers\Statistics\General\TotalTasksCompletedController;
use App\Http\Controllers\Statistics\General\TotalTasksCreatedController;
use App\Http\Controllers\Statistics\General\UsersPopularCategoryController;
use App\Http\Controllers\Statistics\General\UsersWithUsController;
use App\Http\Controllers\Statistics\Personal\YouAreWithUsController;
use App\Http\Controllers\Statistics\Personal\YouHaveCompletedTasksController;
use App\Http\Controllers\Statistics\Personal\YouHaveCreatedTasksController;
use App\Http\Controllers\Statistics\Personal\YouPopularCategoryController;
use App\Http\Controllers\Task\AnotherActions\GetCountTaskCategoryController;
use App\Http\Controllers\Task\AnotherActions\GetCountTasksTodayController;
use App\Http\Controllers\Task\AnotherActions\TaskCompletedController;
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


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/categories', \App\Http\Controllers\Category\IndexController::class);
    Route::get('/category/{id}', GetCategoryController::class);
});

Route::middleware('auth:sanctum')->group(function () {
   Route::get('/priorities', \App\Http\Controllers\Priority\IndexController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/category/{id}/tasks', [\App\Http\Controllers\Task\IndexController::class, 'index']);
    Route::post('/tasks', [\App\Http\Controllers\Task\StoreController::class, 'store']);
    Route::get('/tasks/{id}', [\App\Http\Controllers\Task\ShowController::class, 'show']);
    Route::patch('/tasks/{id}', [\App\Http\Controllers\Task\UpdateController::class, 'update']);
    Route::delete('/tasks/{id}', [\App\Http\Controllers\Task\DestroyController::class, 'destroy']);
    Route::patch('/tasks/completed/{id}', TaskCompletedController::class);

});

Route::prefix('tasks/info')->middleware('auth:sanctum')->group(function () {
    Route::get('/quantity_today', GetCountTasksTodayController::class);
    Route::get('/quantity_by_category', GetCountTaskCategoryController::class);
});

Route::prefix('statistics')->middleware('auth:sanctum')->group(function (){

   Route::prefix('general')->group(function (){
     Route::get('/users_with_us', UsersWithUsController::class);
     Route::get('/total_tasks_created', TotalTasksCreatedController::class);
     Route::get('/total_tasks_completed', TotalTasksCompletedController::class);
     Route::get('/users_popular_category', UsersPopularCategoryController::class);
   });

   Route::prefix('personal')->group(function (){
      Route::get('/you_are_with_us', YouAreWithUsController::class);
      Route::get('/you_have_created_tasks', YouHaveCreatedTasksController::class);
      Route::get('/you_have_completed_tasks', YouHaveCompletedTasksController::class);
      Route::get('/you_popular_category', YouPopularCategoryController::class);
   });
});

