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
    'uses'=> 'PerfilController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/ubigeo', [
    'uses' => 'UbigeoController@buscar',
    'middleware' => 'auth.jwt'
]);

Route::get('/usuario', [
    'uses' => 'UserController@get',
    'middleware' => 'auth.jwt'
]);
Route::get("/usuario/perfiles/{id_perfil}", [
    'uses' => 'UserController@getUsuariosxPerfil',
    'middleware' => 'auth.jwt'
]);
Route::post('/usuario', [
    'uses' => 'UserController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/usuario', [
    'uses' => 'UserController@update',
    'middleware' => 'auth.jwt'
]);

Route::get('/proveedor', [
    'uses' => 'ProveedorController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/proveedor', [
    'uses' => 'ProveedorController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/proveedor', [
    'uses' => 'ProveedorController@update',
    'middleware' => 'auth.jwt'
]);

Route::get('/rubro', [
    'uses' => 'RubroController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/rubro', [
    'uses' => 'RubroController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/rubro', [
    'uses' => 'RubroController@update',
    'middleware' => 'auth.jwt'
]);

// Tipos de cartera

Route::get('/tipos-cartera', [
    'uses' => 'TipoCarteraController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/tipos-cartera', [
    'uses' => 'TipoCarteraController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/tipos-cartera', [
    'uses' => 'TipoCarteraController@update',
    'middleware' => 'auth.jwt'
]);

// Tipos de producto

Route::get('/tipo-productos', [
    'uses' => 'TipoProductoController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/tipo-productos', [
    'uses' => 'TipoProductoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/tipo-productos', [
    'uses' => 'TipoProductoController@update',
    'middleware' => 'auth.jwt'
]);

// Tipos de resultado

Route::get('/tipos-resultado', [
    'uses' => 'TiposResultadoController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/tipos-resultado', [
    'uses' => 'TiposResultadoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/tipos-resultado', [
    'uses' => 'TiposResultadoController@update',
    'middleware' => 'auth.jwt'
]);

// Tipos de resultado

Route::get('/tipo-direccion', [
    'uses' => 'TipoDireccionController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/tipo-direccion', [
    'uses' => 'TipoDireccionController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/tipo-direccion', [
    'uses' => 'TipoDireccionController@update',
    'middleware' => 'auth.jwt'
]);

// Tipos de telefono

Route::get('/tipo-telefono', [
    'uses' => 'TipoTelefonoController@get',
]);
Route::post('/tipo-telefono', [
    'uses' => 'TipoTelefonoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/tipo-telefono', [
    'uses' => 'TipoTelefonoController@update',
    'middleware' => 'auth.jwt'
]);

// Tipos de contacto

Route::get('/tipo-contacto', [
    'uses' => 'TipoContactoController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/tipo-contacto', [
    'uses' => 'TipoContactoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/tipo-contacto', [
    'uses' => 'TipoContactoController@update',
    'middleware' => 'auth.jwt'
]);

// Cartera

Route::get('/cartera', [
    'uses' => 'CarteraController@get',
    'middleware' => 'auth.jwt'
]);

Route::get("/cartera/{id_cartera}", [
    'uses' => 'CarteraController@getSegmentos',
    'middleware' => 'auth.jwt'
]);

Route::get("/cartera/proveedor/{id_proveedor}", [
    'uses' => 'CarteraController@getCarterasxProveedor',
    'middleware' => 'auth.jwt'
]);

Route::post('/cartera', [
    'uses' => 'CarteraController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/cartera', [
    'uses' => 'CarteraController@update',
    'middleware' => 'auth.jwt'
]);

// Producto

Route::get('/producto', [
    'uses' => 'ProductoController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/producto', [
    'uses' => 'ProductoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/producto', [
    'uses' => 'ProductoController@update',
    'middleware' => 'auth.jwt'
]);

// Resultados

Route::get('/resultado', [
    'uses' => 'ResultadoController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/resultado', [
    'uses' => 'ResultadoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/resultado', [
    'uses' => 'ResultadoController@update',
    'middleware' => 'auth.jwt'
]);

// Justificaciones

Route::get('/justificacion', [
    'uses' => 'JustificacionController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/justificacion', [
    'uses' => 'JustificacionController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/justificacion', [
    'uses' => 'JustificacionController@update',
    'middleware' => 'auth.jwt'
]);

// Equipo de trabajo

Route::get('/equipo-trabajo', [
    'uses' => 'EquipoTrabajoController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/equipo-trabajo', [
    'uses' => 'EquipoTrabajoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/equipo-trabajo', [
    'uses' => 'EquipoTrabajoController@update',
    'middleware' => 'auth.jwt'
]);

// Equipo de Trabajo - Cartera

Route::get('/equipo-trabajo-cartera', [
    'uses' => 'EquipoTrabajoCarteraController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/equipo-trabajo-cartera', [
    'uses' => 'EquipoTrabajoCarteraController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/equipo-trabajo-cartera', [
    'uses' => 'EquipoTrabajoCarteraController@update',
    'middleware' => 'auth.jwt'
]);

// Paleta de resultados

Route::get('/paleta-resultados', [
    'uses' => 'PaletaResultadoController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/paleta-resultados', [
    'uses' => 'PaletaResultadoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/paleta-resultados', [
    'uses' => 'PaletaResultadoController@update',
    'middleware' => 'auth.jwt'
]);

// Producto - Cartera

Route::get('/producto-cartera', [
    'uses' => 'ProductoCarteraController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/producto-cartera', [
    'uses' => 'ProductoCarteraController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/producto-cartera', [
    'uses' => 'ProductoCarteraController@update',
    'middleware' => 'auth.jwt'
]);

// Producto - Proveedor

Route::get('/producto-proveedor', [
    'uses' => 'ProductoProveedorController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/producto-proveedor', [
    'uses' => 'ProductoProveedorController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/producto-proveedor', [
    'uses' => 'ProductoProveedorController@update',
    'middleware' => 'auth.jwt'
]);

// Tipo de Contacto - Resultado

Route::get('/tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@update',
    'middleware' => 'auth.jwt'
]);

// Segmentos

Route::get('/segmento', [
    'uses' => 'SegmentoController@get',
    'middleware' => 'auth.jwt'
]);
Route::get('/segmento/carteras/{id_cartera}', [
    'uses' => 'SegmentoController@getSegmentosxCartera',
    'middleware' => 'auth.jwt'
]);
Route::post('/segmento', [
    'uses' => 'SegmentoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/segmento', [
    'uses' => 'SegmentoController@update',
    'middleware' => 'auth.jwt'
]);

// Relacion Equipo de Trabajo

Route::get('/relacion-equipo-trabajo', [
    'uses' => 'EquipoTrabajoController@get',
    'middleware' => 'auth.jwt'
]);

Route::post('/relacion-equipo-trabajo', [
    'uses' => 'EquipoTrabajoController@set',
    'middleware' => 'auth.jwt'
]);

Route::put('/relacion-equipo-trabajo', [
    'uses' => 'EquipoTrabajoController@update',
    'middleware' => 'auth.jwt'
]);

// Relacion Equipo de Trabajo - Cartera

Route::get('/relacion-equipo-trabajo-cartera', [
    'uses' => 'EquipoTrabajoCarteraController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/relacion-equipo-trabajo-cartera', [
    'uses' => 'EquipoTrabajoCarteraController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/relacion-equipo-trabajo-cartera', [
    'uses' => 'EquipoTrabajoCarteraController@update',
    'middleware' => 'auth.jwt'
]);

// Relacion Producto - Cartera

Route::get('/relacion-producto-cartera', [
    'uses' => 'ProductoCarteraController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/relacion-producto-cartera', [
    'uses' => 'ProductoCarteraController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/relacion-producto-cartera', [
    'uses' => 'ProductoCarteraController@update',
    'middleware' => 'auth.jwt'
]);

// Relacion Producto - Proveedor

Route::get('/relacion-producto-proveedor', [
    'uses' => 'ProductoProveedorController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/relacion-producto-proveedor', [
    'uses' => 'ProductoProveedorController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/relacion-producto-proveedor', [
    'uses' => 'ProductoProveedorController@update',
    'middleware' => 'auth.jwt'
]);

// Relacion Producto - Proveedor

Route::get('/relacion-tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/relacion-tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/relacion-tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@update',
    'middleware' => 'auth.jwt'
]);

// Relacion Tipo de contacto - resultado

Route::get('/relacion-tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/relacion-tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/relacion-tipo-contacto-resultado', [
    'uses' => 'TipoContactoResultadoController@update',
    'middleware' => 'auth.jwt'
]);

// Paleta de Resultados

Route::get('/paleta-resultados', [
    'uses' => 'PaletaResultadoController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/paleta-resultados', [
    'uses' => 'PaletaResultadoController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/paleta-resultados', [
    'uses' => 'PaletaResultadoController@update',
    'middleware' => 'auth.jwt'
]);

// Carga de asignacion

Route::get('/cargar-asignacion', [
    'uses' => 'CargarAsignacionController@get',
    'middleware' => 'auth.jwt'
]);
Route::post('/cargar-asignacion', [
    'uses' => 'CargarAsignacionController@set',
    'middleware' => 'auth.jwt'
]);
Route::put('/cargar-asignacion', [
    'uses' => 'CargarAsignacionController@update',
    'middleware' => 'auth.jwt'
]);

// Login

Route::post('/login/auth', [
    'uses' => 'LoginController@auth'
]);

Route::post('/cargar-asignacion', [
    'uses' => 'CargarAsignacionController@set'
]);

Route::put('/cargar-asignacion', [
    'uses' => 'CargarAsignacionController@update'
]);

// Menu

Route::post('/menu/perfil-menu-contenedor-base', [
    'uses' => 'MenuController@create_perfil_menu_contenedor_base',
    'middleware' => 'auth.jwt'
]);

Route::get('/menu/perfil-menu-contenedor-base', [
    'uses' => 'MenuController@get_perfil_menu_contenedor_base',
    'middleware' => 'auth.jwt'
]);

Route::post('/menu/menu-contenedor', [
    'uses' => 'MenuController@create_menu_contenedor',
    'middleware' => 'auth.jwt'
]);

Route::get('/menu/menu-contenedor', [
    'uses' => 'MenuController@get_menu_contenedor',
    'middleware' => 'auth.jwt'
]);

Route::get('/menu/menu-contenedor/contenedores', [
    'uses' => 'MenuController@get_contenedores',
    'middleware' => 'auth.jwt'
]);

Route::post('/menu/menu-item', [
    'uses' => 'MenuController@create_menu_item',
    'middleware' => 'auth.jwt'
]);

Route::get('/menu/menu-item', [
    'uses' => 'MenuController@get_menu_item',
    'middleware' => 'auth.jwt'
]);

Route::post('/menu/menu-contenedor-item', [
    'uses' => 'MenuController@create_menu_contenedor_items',
    'middleware' => 'auth.jwt'
]);

Route::get('/menu/menu-contenedor-item', [
    'uses' => 'MenuController@get_menu_contenedor_items',
    'middleware' => 'auth.jwt'
]);