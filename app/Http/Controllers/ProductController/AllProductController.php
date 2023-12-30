<?php

namespace App\Http\Controllers\ProductController;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AllProductController extends Controller

{
    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->toArray();
        return response()->json(Product::all());
    }
}
