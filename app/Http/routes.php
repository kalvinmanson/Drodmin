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
    Route::get('pictures/manager', 'PictureController@manager');
    Route::resource('pages', 'PageController');
    Route::resource('pictures', 'PictureController');
    Route::resource('categories', 'CategoryController');
    Route::resource('fields', 'FieldController');
    Route::resource('menus', 'MenuController');
    Route::resource('links', 'LinkController');
    Route::resource('users', 'UserController');
});

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//mis rutas
Route::get('{category}/{slug}', 'PageController@show')->where('category', '[a-z,0-9-]+')->where('slug', '[a-z,0-9-]+');
Route::get('{slug}', 'CategoryController@show')->where('slug', '[a-z,0-9-]+');

//storage route
Route::get('images/{filename}', function ($filename)
{
    $path = storage_path('app') . '/' . $filename;

    if(!File::exists($path)) {
    	return $path;
    	//abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});