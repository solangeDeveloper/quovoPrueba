<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class plaidController extends Controller
{
    public function getInstitutionbyId()
    {
        $client = new  \GuzzleHttp\Client();
        $url = "https://sandbox.plaid.com/institutions/get_by_id";
        //$url="https://development.plaid.com/institutions/get_by_id";
        $response = $client->post($url, [
            'headers' => ['Content-type' => 'application/json'],
            'json' => [
                "public_key"=>"adcd08647f3f0dcabdb10fe8791863",
                 "institution_id"=>"ins_109511", //sandbox
                //"institution_id"=>"ins_100773",
            ],
        ]);
        dd($response->getBody()->getContents());
    }

    /*get public token
    solo dura media hora*/
    public function createItemSanbox()
    {
        $client = new  \GuzzleHttp\Client();
        $url = "https://sandbox.plaid.com/sandbox/public_token/create";
        $response = $client->post($url, [
            'headers' => ['Content-type' => 'application/json'],
            'json' => [
                "public_key"=>"adcd08647f3f0dcabdb10fe8791863",
                "institution_id"=>"ins_109511",
                "initial_products"=>['auth', 'transactions']
            ],
        ]);
        dd($response->getBody()->getContents());
    }

    /*retorna el access token item_id, request_id*/
    public function exchangeToken()
    {
        $public_token= "public-sandbox-27950d5f-5119-4d3e-a0fc-95e02c9b310c";
        $client = new  \GuzzleHttp\Client();
        $url = "https://sandbox.plaid.com/item/public_token/exchange";
        $response = $client->post($url, [
            'headers' => ['Content-type' => 'application/json'],
            'json' => [
                "client_id"=>"5c12b119736cca0010f4dd52",
                "secret"=>"2eeccf5041b8cc92fdc9c2fb187312",
                "public_token"=>$public_token
            ],
        ]);
        dd($response->getBody()->getContents());
    }

    public function getAuthenticate()
    {
        $access_token="access-sandbox-9f48a799-9835-4216-8e47-7157dfd43e42";
        $client = new  \GuzzleHttp\Client();
        $url = "https://sandbox.plaid.com/auth/get";
        $response = $client->post($url, [
            'headers' => ['Content-type' => 'application/json'],
            'json' => [
                "client_id"=>"5c12b119736cca0010f4dd52",
                "secret"=>"2eeccf5041b8cc92fdc9c2fb187312",
                "access_token"=>$access_token
            ],
        ]);
        dd($response->getBody()->getContents());
    }

    /*development*/

    public function searchInstitutions()
    {
        $access_token= "access-sandbox-cbe3dd7a-3c81-4304-95dd-0af83983ca29";
        $client = new  \GuzzleHttp\Client();
        $url = "https://development.plaid.com/institutions/search";
        $response = $client->post($url, [
            'headers' => ['Content-type' => 'application/json'],
            'json' => [
                "public_key"=>"adcd08647f3f0dcabdb10fe8791863",
                 "query"=> "BB&T",
                "products"=>["transactions"],
            ],
        ]);
        dd($response->getBody()->getContents());
    }

    public function createItemDev()
    {
        $client = new  \GuzzleHttp\Client();
        $url = "https://development.plaid.com/item/public_token/create";
        $response = $client->post($url, [
            'headers' => ['Content-type' => 'application/json'],
            'json' => [
                "client_id"=>"5c12b119736cca0010f4dd52",
                "secret"=>"013bcfdd9bdcf60af0ed4095b12d05",
                 "access_token"=>"access-sandbox-de3ce8ef-33f8-452c-a685-8671031fc0f6"
            ],
        ]);
        dd($response->getBody()->getContents());
    }
}
