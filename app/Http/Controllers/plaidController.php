<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class plaidController extends Controller
{
    public function plaidAuth()
    {
        $client = new \GuzzleHttp\Client();
        $body = [];
        $body['client_id'] = '5c12b119736cca0010f4dd52';
        $body['secret'] = '2eeccf5041b8cc92fdc9c2fb187312';
        $body['public_token'] = 'adcd08647f3f0dcabdb10fe8791863';

        $client = new \GuzzleHttp\Client([
            'base_url' => ['https://sandbox.plaid.com/item/public_token/exchange', []],
            'defaults' => [
                'headers'  => ['content-type' => 'application/json', 'Accept' => 'application/json'],
                'body' => json_encode($body),
            ],
        ]);
        $client = json_decode($client, true);
        dd($client);
    }
}
