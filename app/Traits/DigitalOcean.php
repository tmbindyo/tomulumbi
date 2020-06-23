<?php

namespace App\Traits;

use Auth;
use Illuminate\Support\Facades\Http;


trait DigitalOcean
{
    public function getHeader($response){

        $status = $response->getHeader("status");
        $ratelimitLimit = $response->getHeader("ratelimit-limit");
        $ratelimitRemaining = $response->getHeader("ratelimit-remaining");
        $ratelimitReset = $response->getHeader("ratelimit-reset");
        $header = array(
            "status" => $status,
            "ratelimitLimit" => $ratelimitLimit,
            "ratelimitRemaining" => $ratelimitRemaining,
            "ratelimitReset" => $ratelimitReset
        );
        return $header;
    }

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

        $header = $this->getHeader($response);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function actions(){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

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

        return $response;

    }

    public function actionShow($action_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/actions/".$action_id;
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function balance(){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/customers/my/balance";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function billingHistory(){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/customers/my/billing_history";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function volumes(){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

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

        return $response;

    }

    public function volumeNameSearch($name){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

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

        return $response;

    }

    public function volumeShow($volume_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/volumes/".$volume_id;
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function volumeShowSnapshots($volume_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/volumes/".$volume_id."/snapshots";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function droplets(){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

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

        return $response;

    }

    public function dropletShow($droplet_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/droplets/".$droplet_id;
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function dropletShowSnapshots($droplet_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/droplets/".$droplet_id."/snapshots";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function dropletShowBackups($droplet_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/droplets/".$droplet_id."/backups";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function dropletShowActions($droplet_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/droplets/".$droplet_id."/actions";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function dropletReboot($droplet_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/droplets/".$droplet_id."/actions";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('POST', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ],
            'form_params' => [
                'type' => 'reboot'
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function dropletPowerCycle($droplet_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/droplets/".$droplet_id."/actions";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('POST', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ],
            'form_params' => [
                'type' => 'power_cycle'
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function dropletShutdown($droplet_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/droplets/".$droplet_id."/actions";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('POST', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ],
            'form_params' => [
                'type' => 'shutdown'
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function dropletPowerOff($droplet_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/droplets/".$droplet_id."/actions";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('POST', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ],
            'form_params' => [
                'type' => 'power_off'
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function dropletPowerOn($droplet_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/droplets/".$droplet_id."/actions";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('POST', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ],
            'form_params' => [
                'type' => 'power_on'
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function firewalls(){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/firewalls";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function invoices(){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/customers/my/invoices";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function invoiceShow($invoice_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/customers/my/invoices/".$invoice_id;
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function invoiceShowSummary($invoice_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/customers/my/invoices/".$invoice_id."/summary";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function projects(){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/projects";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function projectShow($project_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/projects/".$project_id;
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function projectShowResources($project_id){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/projects/".$project_id."/resources";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

    public function sizes(){

        $api_key = "c81e57c94b3dcf84ae72344b40184519c59775cc817bfbaf2f0a4b4902c01155";

        $endpoint = "https://api.digitalocean.com/v2/sizes";
        $client = new \GuzzleHttp\Client();

        // Response
        $response = $client->request('GET', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer '.$api_key
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        return $response;

    }

}
