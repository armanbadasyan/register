<?php

namespace App\Services\Dto;

use App\Http\Requests\WeatherRequest;
use Spatie\LaravelData\Data;

class WeatherDto extends Data
{
     public  string $city;

    public static function fromRequest(WeatherRequest $request): WeatherDto
    {
        return self::from([
            'city' => $request->getDirection()
        ]);
    }
}
