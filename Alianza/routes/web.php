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
});
Route::get('postulaciones/{id?}',[
	'uses' => 'prueba@prueba'

	]);**/

Auth::routes();

Route::get('/', 'InicioController@indexInicio');

/**administrador**/
Route::get('home', 'HomeController@index');
//Route::get('apartamentos', 'ApartamentosController@indexApartamentos');
//rutas parametros
//Route::resource('/parametros','ParametroController');
//Route::get('inmueble','InmuebleController@indexInmueble');

Route::get('parametro','ParametroController@index');
Route::get('inmueble','InmuebleController@index');
//Route::get('apartaestudios', 'ApartaestudioController@indexApartaestudio');

//Route::get('lotes', 'LotesController@indexLotes');

/**usuario*
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

Route::get('error',function(){abort(404);});