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

Route::get('todo', 'TodoController@index');
Route::get('todo/add', 'TodoController@add');
Route::post('todo/addPost', 'TodoController@addPost')->middleware('html.minify');
Route::get('todo/show/{id}', 'TodoController@show');
Route::get('todo/edit/{id}', 'TodoController@edit');
Route::group(['middleware' => 'html.minify'], function () {
    Route::post('todo/addPost', 'TodoController@addPost');
    Route::post('todo/edit', 'TodoController@editPost');
});