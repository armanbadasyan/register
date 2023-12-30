<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KinoController extends Controller
{
    public function kino(Request $request)
    {
        $curl = curl_init();
        $name = $request['name'];

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://kinopoiskapiunofficial.tech/api/v2.1/films/search-by-keyword?keyword={$name}&page=1",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'accept: application/json',
                'X-API-KEY: b6f38b7a-9bd0-4432-9674-52c0930461c8'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return json_decode($response);
    }

}
