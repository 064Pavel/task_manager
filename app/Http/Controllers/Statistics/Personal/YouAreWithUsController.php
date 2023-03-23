<?php

namespace App\Http\Controllers\Statistics\Personal;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class YouAreWithUsController extends Controller
{
    public function __invoke() : JsonResponse
    {
        $date = User::select('created_at')->where('id', Auth::id())->get();
        return response()->json($date);
    }
}
