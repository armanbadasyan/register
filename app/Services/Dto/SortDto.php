<?php

namespace App\Services\Dto;

use App\Http\Requests\SortRequest;
use Spatie\LaravelData\Data;

class SortDto extends Data
{
    public  string $sort;

    public static function fromRequest(SortRequest $request): SortDto
    {

        return self::from([
            'sort' => $request->getSort()
        ]);

    }
}
