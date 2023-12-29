<?php

namespace App\Services\Dto;

use App\Http\Requests\AuthRequest\LogoutRequest;
use App\Models\User;
use Spatie\LaravelData\Data;

class LogoutDto extends Data
{
    public User $user;
    public static function fromRequest(LogoutRequest $request): LogoutDto
    {
        return self::from([
            'user' => $request->getAuthUser(),
        ]);
    }
}
