<?php

namespace App\Http\Controllers;



use App\Models\Product;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class CreateProductController extends Controller
{
    public function create(Request $request): JsonResponse
    {
        request()->validate([
            'title' => 'required|string',
            'price' => 'required|int',
            'user_id' => 'required|int',
        ]);

        $data = [
            'title' => $request->title,
            'price' => $request->price,
            'user_id' => $request->user_id,
        ];
        $request->toArray();

        Product::query()->create($data);
        return response()->json($data);
    }

    public function index(Request $request): JsonResponse
    {
        $this->middleware(['auth:api']);
        $request->toArray();
        return response()->json(Product::all());


    }

    public function show(Request $request): JsonResponse
    {
        $users = User::query()
            ->where('id', $request['user_id'])
            ->with('products')
            ->first();
        return response()->json($users);
    }


}
