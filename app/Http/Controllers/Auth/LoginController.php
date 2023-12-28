<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\AuthRequest\LoginRequest;
use App\Http\Resources\AuthResource\LoginResource;
use App\Services\Actions\Auth\LoginAction;
use App\Services\Auth\Dto\LoginDto;

class LoginController
{

    public function __invoke(
        LoginRequest $request,
        LoginAction $loginAction
    ): LoginResource {
        $dto = LoginDto::fromRequest($request);
        $result = $loginAction->run($dto);

        return new LoginResource($result);
    }
}
