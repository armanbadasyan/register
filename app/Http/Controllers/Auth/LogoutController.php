<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest\LogoutRequest;
use App\Services\Actions\Auth\LogoutAction;
use App\Services\Dto\LogoutDto;
use Illuminate\Http\JsonResponse;

class LogoutController extends Controller
{
    public function __invoke(
        LogoutRequest $request,
        LogoutAction $logoutAction
    ): JsonResponse {
        $dto = LogoutDto::fromRequest($request);

        $logoutAction->run($dto->user);

        return response()->json('User logout');
    }


}
