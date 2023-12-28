<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest\RegisterRequest;
use App\Http\Resources\AuthResource\RegisterResource;
use App\Services\Actions\Auth\RegisterAction;
use App\Services\Auth\Dto\RegisterDto;

class RegisterController extends Controller
{

    public function register(

        RegisterRequest $request,
        RegisterAction $registerAction
    ):   RegisterResource {

        $dto = RegisterDto::fromRequest($request);
        $user = $registerAction->run($dto);

        return new RegisterResource($user);
    }
}
