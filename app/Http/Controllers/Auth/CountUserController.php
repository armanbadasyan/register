<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class CountUserController extends Controller
{
    public function count(): JsonResponse
    {
        $check = User::query()->whereNotNull('id')->pluck('id')->toArray();
        $totalUsers = count($check);
        return response()->json([
            'total users' => $totalUsers
        ]);
    }
}
