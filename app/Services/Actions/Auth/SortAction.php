<?php

namespace App\Services\Actions\Auth;

use App\Services\Dto\SortDto;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class SortAction
{
    public function run(SortDto $dto): JsonResponse
    {
        $table = DB::table('users');
        $direction = $dto->sort;

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
