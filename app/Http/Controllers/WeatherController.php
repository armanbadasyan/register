<?php

namespace App\Http\Controllers;

use App\Http\Requests\WeatherRequest;
use App\Services\Actions\Auth\WeatherAction;
use App\Services\Dto\WeatherDto;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WeatherController extends Controller
{
    public function weather(
        WeatherRequest $request,
        WeatherAction $loginAction
    ): JsonResponse {
        $dto = WeatherDto::fromRequest($request);
        $result = $loginAction->run($dto);

        return response()->json($result);
    }
}
