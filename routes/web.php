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

Route::get('todo', 'TodoController@index')->middleware("simple_auth");
Route::get('todo/search', 'HomeController@search');
Route::get('todo/add', 'TodoController@add');
// Route::post('todo/addPost', 'TodoController@addPost')->middleware('html.minify');
Route::get('todo/show/{id}', 'TodoController@show');
Route::get('todo/edit/{id}', 'TodoController@edit');
Route::post('todo/destory/{id}', 'TodoController@destory');
Route::group(['middleware' => 'html.minify'], function () {
    Route::post('todo/addPost', 'TodoController@addPost');
    Route::post('todo/edit', 'TodoController@editPost');
});

Route::get('/', function () {
    return redirect('home');
});
 
//  Route::get('/home', function () {
//     return view('top');
// });
 
 //ログイン処理
// Route::post('/login', 'SimpleLoginController@login');
// //ログアウト
// Route::post('/logout', 'SimpleLogoutController@logout');
// // ユーザー登録
// Route::get('/user_add', 'UserController@userAdd');
// Route::post('/user_add', 'UserController@userAddPost')->middleware('useradd');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
