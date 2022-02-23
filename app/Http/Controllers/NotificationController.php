<?php

namespace App\Http\Controllers;


class NotificationController extends Controller
{
    public static function testSendSMS()
    {
        // payload = {
        //     "apiClientID":self.incoming_client_id,
        //     "key":self.incoming_api_key,
        //     "secret":self.incoming_secret,
        //     "txtMessage":message,
        //     "MSISDN":recipients,
        //     "linkID":kwargs['linkID'],
        //     "serviceID":kwargs['serviceID'],
        // }

        $message = '254708085128';
        $phone_number = '254708085128';

        // return $payload;
        $url = 'https://app.bongasms.co.ke/api/send-sms-v1';

        $message = "tomulumbi: ".$message;
        $apiClientID = env("OliveTreeAPIClientID", "somedefaultvalue");
        $key = env("OliveTreeAPIKey", "somedefaultvalue");
        $secret = env("OliveTreeAPISecret", "somedefaultvalue");
        $serviceID = env("OliveTreeServiceID", "somedefaultvalue");

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $url, [
            'form_params' => [
                "apiClientID" => $apiClientID,
                "key" => $key,
                "secret" => $secret,
                "txtMessage" => $message,
                "MSISDN" => $phone_number,
                "linkID" => "foo",
                "serviceID" => $serviceID,
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        $body = json_decode($response->getBody(), true);

        if ($body['credits'] < 200){
            $remaining_credits = $body['credits'] - 1;
            $warning_messagee = "You have ".$remaining_credits." messages remaining remaining!";
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', $url, [
                'form_params' => [
                    "apiClientID" => $apiClientID,
                    "key" => $key,
                    "secret" => $secret,
                    "txtMessage" => $warning_messagee,
                    "MSISDN" => '254708085128',
                    "linkID" => "foo",
                    "serviceID" => $serviceID,
                ]
            ]);

        }
        return $body;
    }


    public static function sendSMS($phone_number, $message)
    {
        $url = 'https://app.bongasms.co.ke/api/send-sms-v1';

        $message = "tomulumbi: ".$message;
        $apiClientID = env("OliveTreeAPIClientID", "somedefaultvalue");
        $key = env("OliveTreeAPIKey", "somedefaultvalue");
        $secret = env("OliveTreeAPISecret", "somedefaultvalue");
        $serviceID = env("OliveTreeServiceID", "somedefaultvalue");

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $url, [
            'form_params' => [
                "apiClientID" => $apiClientID,
                "key" => $key,
                "secret" => $secret,
                "txtMessage" => $message,
                "MSISDN" => $phone_number,
                "linkID" => "foo",
                "serviceID" => $serviceID,
            ]
        ]);

        $statusCode = $response->getStatusCode();
        $content = $response->getBody();

        $body = json_decode($response->getBody(), true);

        if ($body['credits'] < 200){
            $remaining_credits = $body['credits'] - 1;
            $warning_messagee = "You have ".$remaining_credits." messages remaining remaining!";
            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', $url, [
                'form_params' => [
                    "apiClientID" => $apiClientID,
                    "key" => $key,
                    "secret" => $secret,
                    "txtMessage" => $warning_messagee,
                    "MSISDN" => '254708085128',
                    "linkID" => "foo",
                    "serviceID" => $serviceID,
                ]
            ]);

        }
        return $body;
    }
}
