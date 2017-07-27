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
//Route::post('/register', [
//    'uses' => 'UserController@create'
//]);

Route::post('/perfil', [
   'uses' => 'PerfilController@set'
]);

Route::get('/perfil', [
    'uses'=> 'PerfilController@get'
]);

Route::post('/ubigeo', [
    'uses' => 'UbigeoController@buscar'
]);

Route::get('/usuario', [
    'uses' => 'UsuarioController@get'
]);
Route::post('/usuario', [
    'uses' => 'UsuarioController@set'
]);
Route::put('/usuario', [
    'uses' => 'UsuarioController@update'
]);

Route::get('/proveedor', [
    'uses' => 'ProveedorController@get'
]);
Route::post('/proveedor', [
    'uses' => 'ProveedorController@set'
]);
Route::put('/proveedor', [
    'uses' => 'ProveedorController@update'
]);

Route::get('/rubro', [
    'uses' => 'RubroController@get'
]);
Route::post('/rubro', [
    'uses' => 'RubroController@set'
]);
Route::put('/rubro', [
    'uses' => 'RubroController@update'
]);

// Tipos de cartera

Route::get('/tipos-cartera', [
    'uses' => 'TipoCarteraController@get'
]);
Route::post('/tipos-cartera', [
    'uses' => 'TipoCarteraController@set'
]);
Route::put('/tipos-cartera', [
    'uses' => 'TipoCarteraController@update'
]);

// Tipos de producto

Route::get('/tipo-productos', [
    'uses' => 'TipoProductoController@get'
]);
Route::post('/tipo-productos', [
    'uses' => 'TipoProductoController@set'
]);
Route::put('/tipo-productos', [
    'uses' => 'TipoProductoController@update'
]);

// Tipos de resultado

Route::get('/tipos-resultado', [
    'uses' => 'TiposResultadoController@get'
]);
Route::post('/tipos-resultado', [
    'uses' => 'TiposResultadoController@set'
]);
Route::put('/tipos-resultado', [
    'uses' => 'TiposResultadoController@update'
]);

// Tipos de resultado

Route::get('/tipo-direccion', [
    'uses' => 'TipoDireccionController@get'
]);
Route::post('/tipo-direccion', [
    'uses' => 'TipoDireccionController@set'
]);
Route::put('/tipo-direccion', [
    'uses' => 'TipoDireccionController@update'
]);

// Tipos de telefono

Route::get('/tipo-telefono', [
    'uses' => 'TipoTelefonoController@get'
]);
Route::post('/tipo-telefono', [
    'uses' => 'TipoTelefonoController@set'
]);
Route::put('/tipo-telefono', [
    'uses' => 'TipoTelefonoController@update'
]);

// Tipos de contacto

Route::get('/tipo-contacto', [
    'uses' => 'TipoContactoController@get'
]);
Route::post('/tipo-contacto', [
    'uses' => 'TipoContactoController@set'
]);
Route::put('/tipo-contacto', [
    'uses' => 'TipoContactoController@update'
]);

// Cartera

Route::get('/cartera', [
    'uses' => 'CarteraController@get'
]);

Route::get("/cartera/{id_cartera}", [
    'uses' => 'CarteraController@getSegmentos'
]);

Route::post('/cartera', [
    'uses' => 'CarteraController@set'
]);
Route::put('/cartera', [
    'uses' => 'CarteraController@update'
]);

// Producto

Route::get('/producto', [
    'uses' => 'ProductoController@get'
]);
Route::post('/producto', [
    'uses' => 'ProductoController@set'
]);
Route::put('/producto', [
    'uses' => 'ProductoController@update'
]);

// Resultados

Route::get('/resultado', [
    'uses' => 'ResultadoController@get'
]);
Route::post('/resultado', [
    'uses' => 'ResultadoController@set'
]);
Route::put('/resultado', [
    'uses' => 'ResultadoController@update'
]);

// Justificaciones

Route::get('/justificacion', [
    'uses' => 'JustificacionController@get'
]);
Route::post('/justificacion', [
    'uses' => 'JustificacionController@set'
]);
Route::put('/justificacion', [
    'uses' => 'JustificacionController@update'
]);

// Equipo de trabajo

Route::get('/equipo-trabajo', [
    'uses' => 'EquipoTrabajoController@get'
]);
Route::post('/equipo-trabajo', [
    'uses' => 'EquipoTrabajoController@set'
]);
Route::put('/equipo-trabajo', [
    'uses' => 'EquipoTrabajoController@update'
]);

// Equipo de Trabajo - Cartera

Route::get('/equipo-trabajo-cartera', [
    'uses' => 'EquipoTrabajoCarteraController@get'
]);
Route::post('/equipo-trabajo-cartera', [
    'uses' => 'EquipoTrabajoCarteraController@set'
]);
Route::put('/equipo-trabajo-cartera', [
    'uses' => 'EquipoTrabajoCarteraController@update'
]);

// Paleta de resultados

Route::get('/paleta-resultados', [
    'uses' => 'PaletaResultadoController@get'
]);
Route::post('/paleta-resultados', [
    'uses' => 'PaletaResultadoController@set'
]);
Route::put('/paleta-resultados', [
    'uses' => 'PaletaResultadoController@update'
]);

// Producto - Cartera

Route::get('/producto-cartera', [
    'uses' => 'ProductoCarteraController@get'
]);
Route::post('/producto-cartera', [
    'uses' => 'ProductoCarteraController@set'
]);
Route::put('/producto-cartera', [
    'uses' => 'ProductoCarteraController@update'
]);

// Producto - Proveedor

Route::get('/producto-proveedor', [
    'uses' => 'ProductoProveedorController@get'
]);
Route::post('/producto-proveedor', [
    'uses' => 'ProductoProveedorController@set'
]);
Route::put('/producto-proveedor', [
    'uses' => 'ProductoProveedorController@update'
]);

// Tipo de Contacto - Resultado

Route::get('/tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@get'
]);
Route::post('/tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@set'
]);
Route::put('/tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@update'
]);

// Segmentos

Route::get('/segmento', [
    'uses' => 'SegmentoController@get'
]);
Route::post('/segmento', [
    'uses' => 'SegmentoController@set'
]);
Route::put('/segmento', [
    'uses' => 'SegmentoController@update'
]);