<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/**Route::get('/', function () {
    return view('usuario.inicio');
});*/
Route::get('postulaciones/',[
	'uses' => 'prueba@prueba'

	]);

Auth::routes();

//img


Route::get('/', 'InicioController@indexInicio');
//rutas de opciones y configuracion de datos
Route::get('buscar/{id}', 'lugares@buscar');
Route::post('actualizar/{id}', 'lugares@actualizar');
Route::get('buscarpersona/{id}', 'personas@buscar');
Route::post('actualizarpersona/{id}', 'personas@actualizar');
Route::get('buscartipo/{id}', 'tipos@buscar');
Route::post('actualizartipo/{id}', 'tipos@actualizar');
Route::get('buscarservicio/{id}', 'opciones@buscarservicio');
Route::get('buscardetalle/{id}', 'opciones@buscardetalle');
Route::get('buscaropcion/{id}', 'opciones@buscaropcion');

Route::post('actualizarservicio/{id}', 'opciones@actualizarservicio');
Route::post('actualizardetalle/{id}', 'opciones@actualizardetalle');
Route::post('actualizaropcion/{id}', 'opciones@actualizaropcion');

/**administrador**/
Route::get('home', 'HomeController@index');
//Route::get('apartamentos', 'ApartamentosController@indexApartamentos');
//rutas parametros
Route::resource('/lugares','lugares');
Route::resource('/personas','personas');
Route::resource('/archivos','archivos');
Route::resource('/tipos','tipos');
Route::resource('/opciones','opciones');
//Route::resource('/parametro','ParametroController');
//Route::resource('/persona','PersonaController');
Route::resource('/inmueble','InmuebleController');
//Route::get('inmueble','InmuebleController@indexInmueble');

//Route::get('parametro','ParametroController@index');
Route::get('/inmueble','InmuebleController@index');
//Route::get('apartaestudios', 'ApartaestudioController@indexApartaestudio');

//Route::get('lotes', 'LotesController@indexLotes');

/**usuario*/
Route::get('arriendos', 'ArriendosController@indexArriendos');

Route::get('ventas','VentasController@indexVentas');

Route::get('servicios', 'ServiciosController@indexServicios');

Route::get('acercaDe', 'InicioController@acercaDe');

Route::get('contacto', 'InicioController@contacto');

/**resultados*/
Route::get('arriendoCasa','ResultadoController@arriendoCasa');

Route::get('arriendoApartamen','ResultadoController@arriendoApartamen');

Route::get('arriendoApartaes','ResultadoController@arriendoApartaes');

Route::get('arriendoLocal','ResultadoController@arriendoLocal');

Route::get('ventaCasa','ResultadoController@ventaCasa');

Route::get('ventaApartamen','ResultadoController@ventaApartamen');

Route::get('ventaApartaes','ResultadoController@ventaApartaes');

Route::get('ventaLote','ResultadoController@ventaLote');

/*Busqueda*/

Route::get('buscarInmueble', 'InicioController@buscarInmueble');

Route::get('detallesInmueble/{id}', 'InicioController@detallesInmueble');

Route::get('error',function(){abort(404);});