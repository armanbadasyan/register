<?php

namespace App\Services\Actions\Auth;

use App\Services\Dto\WeatherDto;
use Illuminate\Support\Facades\Http;

class WeatherAction
{
public function run(WeatherDto $dto)
{
    $city = $dto->city;
    $api = '3aaf0b4348974ad8b26125335231512';
    $url = "https://api.weatherapi.com/v1/current.json?key={$api}&q={$city}&aqi=yes";
    $data = Http::get($url);
    $weather = json_decode($data);

    return response()->json($weather);
}
}
