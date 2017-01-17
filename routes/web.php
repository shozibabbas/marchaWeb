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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/categories', 'categoryController@index');

Route::get('/category/{id}', 'categoryController@getItems');

Route::get('/item/{id}', 'itemController@index');

Route::get('/user/{id}', 'userController@index');