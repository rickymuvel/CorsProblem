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

Route::post('/ubigeo', [
    'uses' => 'UbigeoController@buscar'
]);

Route::get('/usuario', [
    'uses' => 'UsuarioController@getUsuarios'
]);
Route::post('/usuario', [
    'uses' => 'UsuarioController@setUsuario'
]);
Route::put('/usuario', [
    'uses' => 'UsuarioController@updateUsuario'
]);

Route::get('/proveedor', [
    'uses' => 'ProveedorController@getProveedores'
]);
Route::post('/proveedor', [
    'uses' => 'ProveedorController@setProveedor'
]);

Route::get('/rubro', [
    'uses' => 'RubroController@getRubros'
]);
Route::post('/rubro', [
    'uses' => 'RubroController@setRubro'
]);
Route::put('/rubro', [
    'uses' => 'RubroController@updateRubro'
]);

// Tipos de cartera

Route::get('/tipos-cartera', [
    'uses' => 'TipoCarteraController@getTiposCartera'
]);
Route::post('/tipos-cartera', [
    'uses' => 'TipoCarteraController@setTipoCartera'
]);
Route::put('/tipos-cartera', [
    'uses' => 'TipoCarteraController@updateTipoCartera'
]);

// Tipos de producto

Route::get('/tipo-productos', [
    'uses' => 'TipoProductoController@getTipoProducto'
]);
Route::post('/tipo-productos', [
    'uses' => 'TipoProductoController@setTipoProducto'
]);
Route::put('/tipo-productos', [
    'uses' => 'TipoProductoController@updateTipoProducto'
]);
