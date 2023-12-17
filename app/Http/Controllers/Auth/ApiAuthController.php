<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Cassandra\Cluster\Builder ;
use GuzzleHttp\Client;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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
        $response = ('You is registrated succesfuly');
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
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response = ['token' => $token];
                return response($response, 422);
            } else {
                $response = ["message" => "Password is wrong"];
                return response($response, 422);
            }
        } else {
            $answer = ('
You are not registered');
            return $answer;
        }
    }

    public function logout(Request $request)
    {
        $request->user()->delete();
        $response = ["message" => 'You have been successfully logged out'];
        return response($response, 200);
    }

    public function weather(Request $request)
    {
        $city = $request['city'];
        $api = '3aaf0b4348974ad8b26125335231512';
        $url = "https://api.weatherapi.com/v1/current.json?key={$api}&q={$city}&aqi=yes";
        $data = Http::get($url);
        $weather = json_decode($data);

        return \response()->json($weather);
    }

    public function kino(Request $request)
    {
        $curl = curl_init();
        $name = $request['name'];
        $page = $request['page'];

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://kinopoiskapiunofficial.tech/api/v2.1/films/search-by-keyword?keyword={$name}&page=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'accept: application/json',
                'X-API-KEY: b6f38b7a-9bd0-4432-9674-52c0930461c8'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

    public function index(Request $request): JsonResponse
    {
        $table = DB::table('users');
        $this->middleware(['auth:api']);
        $request->toArray();
        $direction = $request['sort'];

        $result = match ($direction) {
            'ASC' => $table->orderBy('name', 'ASC')->get(['name','surname']),
            'DESC' => $table->orderBy('name', 'DESC')->get(['name','surname']),
            default => response()->json([
                'success' => false,
                'message' => 'No such direction. The right directions are ASC and DESC',
            ]),
        };

        return response()->json([
            'success' => true,
            'data' => $result,
        ]);
    }
}
