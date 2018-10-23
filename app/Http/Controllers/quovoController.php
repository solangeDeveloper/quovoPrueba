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
                    'Authorization' => "Bearer 52d4570fed6f922257a153e03123a35e24db46859d92bbab45a2d76c652fde27"
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
            'https://api.quovo.com/v3/users/7029577/connections',
            ['headers' => 
                [
                    'Authorization' => "Bearer 52d4570fed6f922257a153e03123a35e24db46859d92bbab45a2d76c652fde27"
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
            'https://api.quovo.com/v3/connections/8638752',
            ['headers' => 
                [
                    'Authorization' => "Bearer 52d4570fed6f922257a153e03123a35e24db46859d92bbab45a2d76c652fde27"
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
            'https://api.quovo.com/v3/connections/8638752/sync',
            ['headers' => 
                [
                    'Authorization' => "Bearer 52d4570fed6f922257a153e03123a35e24db46859d92bbab45a2d76c652fde27"
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
            'https://api.quovo.com/v3/connections/8638752',
            ['headers' => 
                [
                    'Authorization' => "Bearer 52d4570fed6f922257a153e03123a35e24db46859d92bbab45a2d76c652fde27"
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
            'https://api.quovo.com/v3/connections/8638752/sync',
            ['headers' => 
                [
                    'Authorization' => "Bearer 52d4570fed6f922257a153e03123a35e24db46859d92bbab45a2d76c652fde27"
                ],
                'form_params' => [
                    'type' => 'auth'
                ]
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
                    'Authorization' => "Bearer 52d4570fed6f922257a153e03123a35e24db46859d92bbab45a2d76c652fde27"
                ],
            ]
        )->getBody()->getContents();
        $data = json_decode($newresponse);
        dd($data);
    }
}
