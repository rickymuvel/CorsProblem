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
Route::put('/proveedor', [
    'uses' => 'ProveedorController@updateProveedor'
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

// Tipos de resultado

Route::get('/tipos-resultado', [
    'uses' => 'TiposResultadoController@getTiposResultado'
]);
Route::post('/tipos-resultado', [
    'uses' => 'TiposResultadoController@setTiposResultado'
]);
Route::put('/tipos-resultado', [
    'uses' => 'TiposResultadoController@updateTiposResultado'
]);

// Tipos de resultado

Route::get('/tipo-direccion', [
    'uses' => 'TipoDireccionController@getTiposDireccion'
]);
Route::post('/tipo-direccion', [
    'uses' => 'TipoDireccionController@setTipoDireccion'
]);
Route::put('/tipo-direccion', [
    'uses' => 'TipoDireccionController@updateTipoDireccion'
]);

// Tipos de telefono

Route::get('/tipo-telefono', [
    'uses' => 'TipoTelefonoController@getTiposTelefono'
]);
Route::post('/tipo-telefono', [
    'uses' => 'TipoTelefonoController@setTipoTelefono'
]);
Route::put('/tipo-telefono', [
    'uses' => 'TipoTelefonoController@updateTipoTelefono'
]);

// Tipos de contacto

Route::get('/tipo-contacto', [
    'uses' => 'TipoContactoController@getTiposContacto'
]);
Route::post('/tipo-contacto', [
    'uses' => 'TipoContactoController@setTipoContacto'
]);
Route::put('/tipo-contacto', [
    'uses' => 'TipoContactoController@updateTipoContacto'
]);

// Cartera

Route::get('/cartera', [
    'uses' => 'CarteraController@getCarteras'
]);
Route::post('/cartera', [
    'uses' => 'CarteraController@setCartera'
]);
Route::put('/cartera', [
    'uses' => 'CarteraController@updateCartera'
]);

// Producto

Route::get('/producto', [
    'uses' => 'ProductoController@getProductos'
]);
Route::post('/producto', [
    'uses' => 'ProductoController@setProducto'
]);
Route::put('/producto', [
    'uses' => 'ProductoController@updateProducto'
]);

// Resultados

Route::get('/resultados', [
    'uses' => 'ResultadoController@getResultados'
]);
Route::post('/resultados', [
    'uses' => 'ResultadoController@setResultados'
]);
Route::put('/resultados', [
    'uses' => 'ResultadoController@updateResultados'
]);


Route::post('/personas', [
    'uses' => 'PersonasController@crearPersona'
]);



