<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|min:6',

        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $request['password'] = Hash::make($request['password']);
        $request ['remember_token'] = Str::random(10);
        User::create($request->toArray());
        $response=('You is registrated succesfuly');
        return response($response, 200);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255|',
            'password' => 'required|string|min:6',
        ]);
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all(), 422]);
        }
        $user = User::query()->where('email', $request['email'])->first();

if ($user) {
           if (Hash::check($request->password, $user->password)) {

           /* $response = Http::asForm()->post('http://127.0.0.1:8001/oauth/token', [
                    'grant_type' => 'password',
                    'client_id' => '2',
                    'client_secret' => 'VkHjfC8nmbfx8mFOzMusAo7UoEszzFxhR2dzzizw',
                    'username' => 'name',
                    'password' => request('password'),
                    'scope' => '*',]) ;*/



        $token=$user->createToken('Laravel Password Grant Client')->accessToken;
              $response = ['token' => $token];
                return response($response, 422);
            } else {
                $response = ["message" => "Password is wrong"];
                return response($response, 422);
            }
        }
else {
    $answer=('
You are not registered');
    return $answer;
}
    }

    public function logout(Request $request)
    {
    $request->bearerToken();
        $request->user()->token()->delete();;
        $response=["message"=>'You have been successfully logged out'];
        return response($response,200);
    }
}
