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
Route::post('/register', [
    'uses' => 'UserController@create'
]);

Route::post('/perfil', [
   'uses' => 'PerfilController@crearPerfil'
]);

Route::get('/perfil', [
    'uses'=> 'PerfilController@getPerfiles'
]);

Route::post('/usuario', [
   'uses' => 'UsuarioController@setUsuario'
]);
Route::get('/usuario', [
    'uses' => 'UsuarioController@getUsuarios'
]);

Route::post('/proveedor', [
    'uses' => 'ProveedorController@setProveedor'
]);
Route::get('/proveedor', [
    'uses' => 'ProveedorController@getProveedores'
]);

Route::post('/proveedor', [
    'uses' => 'ProveedorController@setProveedor'
]);