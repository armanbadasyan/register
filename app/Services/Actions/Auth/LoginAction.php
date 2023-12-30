<?php

namespace App\Services\Actions\Auth;


use App\Models\User;

use App\Services\Dto\LoginDto;
use Illuminate\Support\Facades\Hash;

class LoginAction
{
    public function __construct()
    {
    }


    public function run(LoginDto $dto)
    {

        $user = User::query()->where('email', $dto->email)->first();
        if ($user) {
            if (Hash::check($dto->password, $user->password)) {

                $token = $user->createToken('Laravel Password Grant Client')->accessToken;

                $response = ['token' => $token];
            } else {
                $response = ["message" => "Password is wrong"];
            }

            return $response;
        }

        }


}
