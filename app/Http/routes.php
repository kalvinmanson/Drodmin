<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::resource('pages', 'PageController');
    Route::resource('categories', 'CategoryController');
    Route::resource('fields', 'FieldController');
    Route::resource('menus', 'MenuController');
    Route::resource('links', 'LinkController');
    Route::resource('users', 'UserController');
    Route::resource('countries', 'CountryController');

    //personales
	Route::post('pages/duplicate', ['as' => 'admin.pages.duplicate', 'uses' => 'PageController@duplicate']);
});

Route::get('/', 'WebController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//mis rutas
Route::match(['get', 'post'], 'contact', 'WebController@contact');
Route::get('{category}/{slug}', 'WebController@page')->where('category', '[a-z,0-9-]+')->where('slug', '[a-z,0-9-]+');
Route::get('{slug}', 'WebController@category')->where('slug', '[a-z,0-9-]+');
