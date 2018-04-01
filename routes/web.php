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

Route::get('/productos', array(
    'as'    => 'productosIndex',
    'uses'  => 'ProductoController@index'
));

Route::get('/productos/create', array(
    'as'    => 'productosCreate',
    'uses'  => 'ProductoController@create'
));

Route::get('/productos/store', array(
    'as'    => 'productosStore',
    'uses'  => 'ProductoController@store'
));