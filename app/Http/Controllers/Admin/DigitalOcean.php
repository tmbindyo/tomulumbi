<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DigitalOcean extends Controller
{


    public function account(){

        $api_key = env('DIGITAL_OCEAN_API_KEY');

        $endpoint = "https://api.digitalocean.com/v2/account";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();
        return $content;
    }

}
