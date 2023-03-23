<?php

namespace App\Http\Controllers\Statistics\General;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UsersWithUsController extends Controller
{
    public function __invoke() : JsonResponse
    {
        $users_with_us = User::all()->count();
        return response()->json($users_with_us);
    }
}
