<?php

namespace App\Http\Controllers;
use GuzzleHttp\Client;

use Illuminate\Http\Request;

class quovoController extends Controller
{
    function crearToken(){
        $client = new \GuzzleHttp\Client(["base_uri"=>"https://api.quovo.com/v3/tokens"]);
        $response = $client->post(
            'tokens',
            [
                'auth' => [ 
                    "carla.ramirez.rojas@gmail.com", 
                    '$Carla2015' 
                ],
                'form_params' => [
                    'name' => 'user4'
                ]
            ]
        );
        $token = json_decode($response->getBody());
        dd($token);
    }
    
    /* param token */
    function crearUsuario(){        
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'POST',
            'https://api.quovo.com/v3/users',
            ['headers' => 
                [
                    'Authorization' => "Bearer 23b5163ff8e49844f7a4e654da9ec475e0aaaa72f7eb42ceecbc7fc92273861f"
                ],
                'form_params' => [
                    'username' => 'user4'
                ]
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }

    /** param user_id */
    function crearConexion(){
        
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'POST',
            'https://api.quovo.com/v3/users/7027249/connections',
            ['headers' => 
                [
                    'Authorization' => "Bearer 23b5163ff8e49844f7a4e654da9ec475e0aaaa72f7eb42ceecbc7fc92273861f"
                ],
                'form_params' => [
                    'institution_id' => '1'
                ]
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }

    /** paramd id de conexion */
    function listarConexion(){        
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'GET',
            'https://api.quovo.com/v3/connections/8635045',
            ['headers' => 
                [
                    'Authorization' => "Bearer 23b5163ff8e49844f7a4e654da9ec475e0aaaa72f7eb42ceecbc7fc92273861f"
                ],
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }

    /* param connection_id */
    function sincronCompleta(){
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'POST',
            'https://api.quovo.com/v3/connections/8635045/sync',
            ['headers' => 
                [
                    'Authorization' => "Bearer 23b5163ff8e49844f7a4e654da9ec475e0aaaa72f7eb42ceecbc7fc92273861f"
                ],
                'form_params' => [
                    'username' => 'user4',
                    'passcode' => 'passhola'
                ]
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }

    /* param connection_id, token **/
    function verfSincroniz(){
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'GET',
            'https://api.quovo.com/v3/connections/8635045',
            ['headers' => 
                [
                    'Authorization' => "Bearer 23b5163ff8e49844f7a4e654da9ec475e0aaaa72f7eb42ceecbc7fc92273861f"
                ],
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }

    function sincronRapida(){
        $client = new \GuzzleHttp\Client();
        $newresponse = $client->request(
            'POST',
            'https://api.quovo.com/v3/connections/8635045/sync',
            ['headers' => 
                [
                    'Authorization' => "Bearer 23b5163ff8e49844f7a4e654da9ec475e0aaaa72f7eb42ceecbc7fc92273861f"
                ],
                'form_params' => [
                    'type' => 'auth'
                ]
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }
}
