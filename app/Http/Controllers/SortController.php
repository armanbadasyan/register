<?php

namespace App\Http\Controllers;

use App\Http\Requests\SortRequest;
use App\Services\Actions\Auth\SortAction;
use App\Services\Dto\SortDto;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SortController extends Controller
{
    public function index(
        SortRequest $request,
        SortAction $sortAction
    ): JsonResponse {
        $dto = SortDto::fromRequest($request);
        $result = $sortAction->run($dto);

        return response()->json($result);
    }
}
