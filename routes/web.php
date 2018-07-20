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

Route::prefix('admin')->namespace('Admin')->as('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', function () {
        // Uses first & second Middleware
    });
    Route::resource('categories', 'CategoryController');
    Route::resource('categories.pages', 'PageController');
    Route::resource('categories.pages.fields', 'FieldController');
    Route::resource('notifications', 'NotificationController');
    Route::resource('contacts', 'ContactController');
    Route::resource('blocks', 'BlockController');
    Route::resource('users', 'UserController');
});


Auth::routes();

Route::get('/home', 'WebController@index')->name('home');
Route::get('/', 'WebController@index')->name('home');
