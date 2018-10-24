<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/creartoken','quovoController@crearToken');
Route::get('/crearusuario','quovoController@crearUsuario');
Route::get('/crearconexion','quovoController@crearConexion');
Route::get('/sincroncompleta','quovoController@sincronCompleta');
Route::get('/consulusercuenta','quovoController@getAccountUser');
Route::get('/consuldetallecuenta','quovoController@getDataAccount');









/*
Route::get('/acepterm','quovoController@AcceptTerm');
Route::get('/consulusercuenta1','quovoController@getAccountConex');
Route::get('/listarconexion','quovoController@listarConexion');
Route::get('/verifsincron','quovoController@verfSincroniz');
Route::get('/sincronrapida','quovoController@sincronRapida');
Route::get('/consultcuenta','quovoController@consultCuenta');*/

















