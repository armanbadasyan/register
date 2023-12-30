<?php

namespace App\Http\Controllers\ProductController;



use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class ProductByUser_idController extends Controller
{


    public function show(Request $request): JsonResponse
    {
        $users = User::query()
            ->where('id', $request['user_id'])
            ->with('products')
            ->first();
        return response()->json($users);
    }


}
