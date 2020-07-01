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

    public function actions(){

        $api_key = env('DIGITAL_OCEAN_API_KEY');

        $endpoint = "https://api.digitalocean.com/v2/actions";
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

    public function volumes(){

        $api_key = env('DIGITAL_OCEAN_API_KEY');

        $endpoint = "https://api.digitalocean.com/v2/volumes";
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

    public function volumeSearchName($name){

        $api_key = env('DIGITAL_OCEAN_API_KEY');

        // curl -X GET -H "Content-Type: application/json" -H "Authorization: Bearer b7d03a6947b217efb6f3ec3bd3504582" "https://api.digitalocean.com/v2/volumes?name=example"

        $endpoint = "https://api.digitalocean.com/v2/volumes?name=".$name;
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

    public function volumeShow($id){

        $api_key = env('DIGITAL_OCEAN_API_KEY');

        // curl -X GET -H "Content-Type: application/json" -H "Authorization: Bearer b7d03a6947b217efb6f3ec3bd3504582" "https://api.digitalocean.com/v2/volumes/7724db7c-e098-11e5-b522-000f53304e51"

        $endpoint = "https://api.digitalocean.com/v2/volumes/".$id;
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

    public function volumeShowSnapshots($id){

        $api_key = env('DIGITAL_OCEAN_API_KEY');

        // curl -X GET -H "Content-Type: application/json" -H "Authorization: Bearer b7d03a6947b217efb6f3ec3bd3504582" "https://api.digitalocean.com/v2/volumes/7724db7c-e098-11e5-b522-000f53304e51"

        $endpoint = "https://api.digitalocean.com/v2/volumes/".$id."/snapshots";
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

    public function droplets(){

        $api_key = env('DIGITAL_OCEAN_API_KEY');

        // curl -X GET -H "Content-Type: application/json" -H "Authorization: Bearer b7d03a6947b217efb6f3ec3bd3504582" "https://api.digitalocean.com/v2/volumes/7724db7c-e098-11e5-b522-000f53304e51"

        $endpoint = "https://api.digitalocean.com/v2/droplets";
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
