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


Route::group(['middleware' => 'auth'], function() {

	Route::get('/', 'InicioController@index');

    Route::group(['prefix' => 'inicio'], function(){

        Route::get('/', 'TodoController@getIndex');

        Route::get('show/{id}', 'TodoController@getShow');

        Route::get('crearConjunto', 'TodoController@getCreate');

        Route::get('editarConjunto/{id}', 'TodoController@getEdit');

        Route::post('create', 'TodoController@postCreate');

        Route::put('edit/{id}', 'TodoController@putEdit');

        Route::put('changeRented/{id}', 'InicioController@changeRented');
    });
});

Auth::routes();

Route::get('/home', 'InicioController@index')->name('home');


/* Route::group(['middleware' => 'auth'], function() {

	Route::get('/', 'HomeController@index');

    Route::group(['prefix' => 'catalog'], function(){

        Route::get('/', 'CatalogController@getIndex');

        Route::get('show/{id}', 'CatalogController@getShow');

        Route::get('create', 'CatalogController@getCreate');

        Route::get('edit/{id}', 'CatalogController@getEdit');

        Route::post('create', 'CatalogController@postCreate');

        Route::put('edit/{id}', 'CatalogController@putEdit');

        Route::put('changeRented/{id}', 'CatalogController@changeRented');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');   */
