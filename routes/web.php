<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/productos/create', array(
    'as'    => 'productosCreate',
    'uses'  => 'ProductoController@create'
));

Route::post('/productos/store', array(
    'as'    => 'productosStore',
    'uses'  => 'ProductoController@store'
));

Route::get('/productos/apartar/{codigo}', array(
    'as'    => 'productosApartar',
    'uses'  => 'ProductoController@apartar'
));

Route::get('/productos/{id}', array(
    'as'    => 'productosDetails',
    'uses'  => 'ProductoController@show'
));

Route::get('/productos', array(
    'as'    => 'productosIndex',
    'uses'  => 'ProductoController@index'
));

Route::post('/apartado', array(
    'as'    => 'apartado',
    'uses'  => 'ApartadoController@store'
))->middleware('check.access');

Route::get('/apartado/abonar/{ID}', array(
    'as'    => 'showAbonar',
    'uses'  => 'ApartadoController@showAbonar'
));

Route::post('/apartado/abonar', array(
    'as'    => 'abonar',
    'uses'  => 'ApartadoController@abonar'
))->middleware('check.access');

Route::get('/apartados/{ID}', array(
    'as'    => 'apartadosDetails',
    'uses'  => 'ApartadoController@show'
));

Route::get('/apartados', array(
    'as'    => 'apartadosIndex',
    'uses'  => 'ApartadoController@index'
));

Route::get('/clientes/create', array(
    'as'    => 'clientesCreate',
    'uses'  => 'ClienteController@create'
));

Route::post('/clientes/store', array(
    'as'    => 'clientesStore',
    'uses'  => 'ClienteController@store' 
));

Route::get('/clientes/{celular}', array(
    'as'    => 'clientesDetails',
    'uses'  => 'ClienteController@show'
));

Route::get('/clientes', array(
    'as'    => 'clientesIndex',
    'uses'  => 'ClienteController@index'
));

Route::post('/ventas/add/producto', array(
    'as'    => 'ventaAddProducto',
    'uses'  => 'VentaController@addProducto'
));

Route::get('/ventas/carrito', array(
    'as'    => 'carrito',
    'uses'  => 'VentaController@carritoIndex' 
));

Route::get('/ventas/checkout', array(
    'as'    => 'checkout',
    'uses'  => 'VentaController@showCheckout'
));

Route::post('/ventas/eliminar/producto', array(
    'as'    => 'ventasEliminar',
    'uses'  => 'VentaController@eliminarProducto'
));