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

//get, post , put, patch, detele

// Route::get('todos', 'TodoController@index');

// Route::get('todos/create','TodoController@create');

// Route::post('todos','TodoController@store');

// Route::get('todos/{id}','TodoController@show');

// Route::delete('todos/{id}','TodoController@destroy');
 
//  Route::put('todos/{id}','TodoController@update');

//  Route::get('todos/{id}/edit','TodoController@edit');
 

 // Route::resource('todos','TodoController');
Route::resource('todos-ajax','TodoAjaxController');
