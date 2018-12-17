<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use Illuminate\Http\Request;

class quovoController extends Controller
{
    public function crearToken()
    {
        $client = new \GuzzleHttp\Client(["base_uri"=>"https://api.quovo.com/v3/tokens"]);
        $response = $client->post(
            'tokens',
            [
                'auth' => [
                    "carla.ramirez.rojas@gmail.com",
                    '$Carla2015'
                ],
                'form_params' => [
                    'name' => 'user9'
                ]
            ]
        );
        $token = json_decode($response->getBody());
        dd($token);
    }
    
    /* param token */
    public function crearUsuario()
    {
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'POST',
            'https://api.quovo.com/v3/users',
            ['headers' =>
                [
                    'Authorization' => "Bearer d80eb4be3fca5cba7719d41708b7c0980bd1856df7ce64374018b794cf4ae53e"
                ],
                'form_params' => [
                    'username' => 'user9',
                    "email" => "testuser@quovo.com",
                    "name" => "Test User"
                ]
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }

    /*function AcceptTerm(){
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'PUT',
            'https://api.quovo.com/v3/users/7056612/terms_of_use',
            ['headers' =>
                [
                    'Authorization' => "Bearer d80eb4be3fca5cba7719d41708b7c0980bd1856df7ce64374018b794cf4ae53e"
                ],
                'form_params' => [
                    'has_accepted' => 'true'
                ]
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }*/

    /** param user_id */
    public function crearConexion()
    {
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'POST',
            'https://api.quovo.com/v3/users/7057215/connections',
            ['headers' =>
                [
                    'Authorization' => "Bearer d80eb4be3fca5cba7719d41708b7c0980bd1856df7ce64374018b794cf4ae53e"
                ],
                'form_params' => [
                    "institution_id"=> '21534'
                ]
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }

    /* param connection_id */
    public function sincronCompleta()
    {
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'POST',
            'https://api.quovo.com/v3/connections/8665128/sync',
            ['headers' =>
                [
                    'Authorization' => "Bearer d80eb4be3fca5cba7719d41708b7c0980bd1856df7ce64374018b794cf4ae53e"
                ],
                'form_params' => [
                    'username' => 'testusername',
                    'passcode' => 'testpasscode'
                ]
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }


    public function getAccountUser()
    {
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'GET',
            'https://api.quovo.com/v3/users/7057215/accounts',
            ['headers' =>
                [
                    'Authorization' => "Bearer d80eb4be3fca5cba7719d41708b7c0980bd1856df7ce64374018b794cf4ae53e"
                ],
            ]
        )->getBody();
        $data = json_decode($newresponse);
        dd($data);
    }


    public function getDataAccount()
    {
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'GET',
            'https://api.quovo.com/v3/accounts/17052869/auth',
            ['headers' =>
                [
                    'Authorization' => "Bearer d80eb4be3fca5cba7719d41708b7c0980bd1856df7ce64374018b794cf4ae53e"
                ],
            ]
        )->getBody();
        $data = json_decode($newresponse);
        dd($data);
    }

    /*function getAccountConex(){
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'GET',
            'https://api.quovo.com/v3/connections/8660297/accounts',
            ['headers' =>
                [
                    'Authorization' => "Bearer 844f48482e0146c86fa5a473b5db71a8643b0b360eda356b063ed5e19894ca12"
                ],
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }*/










    /** paramd id de conexion */
    /*function listarConexion(){
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'GET',
            'https://api.quovo.com/v3/connections/8657911',
            ['headers' =>
                [
                    'Authorization' => "Bearer c288e5086dda4dadb78846e55616e432ac8bd169527c8cbf44db6735ad85c7f3"
                ],
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }

    /* param connection_id, token **/
    /*function verfSincroniz(){
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'GET',
            'https://api.quovo.com/v3/connections/8657911',
            ['headers' =>
                [
                    'Authorization' => "Bearer c288e5086dda4dadb78846e55616e432ac8bd169527c8cbf44db6735ad85c7f3"
                ],
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }

    function sincronRapida(){
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            // 'POST'
            'GET',
            'https://api.quovo.com/v3/connections/8658292/sync',
            ['headers' =>
                [
                    'Authorization' => "Bearer f4e133c2dedfe899da970e84624593e64ce0aeea7820ffac3e8d21f305c1d05e"
                ],
                // 'form_params' => [
                //     'type' => 'auth'
                // ]
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }

    function consultCuenta(){
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'GET',
            'https://api.quovo.com/v3/accounts',
            ['headers' =>
                [
                    'Authorization' => "Bearer f4e133c2dedfe899da970e84624593e64ce0aeea7820ffac3e8d21f305c1d05e"
                ],
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }

    function consultUserAccount(){
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'GET',
            'https://api.quovo.com/v3/users/7049419/accounts',
            ['headers' =>
                [
                    'Authorization' => "Bearer c288e5086dda4dadb78846e55616e432ac8bd169527c8cbf44db6735ad85c7f3"
                ],
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }


    function gtest(){
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'GET',
            'https://api.quovo.com/v3/connections/8658292/accounts',
            ['headers' =>
                [
                    'Authorization' => "Bearer c288e5086dda4dadb78846e55616e432ac8bd169527c8cbf44db6735ad85c7f3"
                ],
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);

    }*/
}
