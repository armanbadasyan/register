<?php

namespace App\Services\Dto;

use App\Http\Requests\AuthRequest\LoginRequest;
use Spatie\LaravelData\Data;

class LoginDto extends Data
{

    public string $email;
    public string $password;


    public static function fromRequest(LoginRequest $request): LoginDto
    {
        return self::from([
                'email' => $request->getEmail(),
                'password' => $request->getPassword(),

            ]
        );
    }
}
