<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DigitalOcean extends Controller
{

    public function account(){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

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
