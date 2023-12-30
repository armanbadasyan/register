<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class EnableController extends Controller
{
    public function enable(): JsonResponse
    {
        $user = Auth::user();
        $enable = $user['enable'];

        $enable = ($enable === 0) ? 1 : 0;

        User::query()->where('id', $user['id'])->update(['enable' => $enable]);

        return response()->json([
            'success' => true,
            'new_status' => $enable,
        ]);
    }
}
