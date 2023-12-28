<?php

namespace App\Services\Dto;

use App\Http\Requests\AuthRequest\RegisterRequest;
use Spatie\LaravelData\Data;

class RegisterDto extends Data
{

    public string $name;
    public string $email;
    public string $password;

    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        return self::from([
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            'password' => $request->getPassword(),

        ]);
    }
}
