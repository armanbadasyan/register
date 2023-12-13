<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCntroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = ['message' => 'index function'];
        return response($response, 200);
    }


    public function store(Request $request)
    {
        $response = ['message' => 'store function'];
        return response($response, 200);
    }

    public function show(string $id)
    {
        $response = ['message' => 'show function'];
        return response($response, 200);
    }


    public function update(Request $request, string $id)
    {
        $response = ['message' => 'update function'];
        return response($response, 200);
    }

    public function destroy(string $id)
    {
        $response = ['message' => 'destroy function'];
        return response($response, 200);
    }
}
