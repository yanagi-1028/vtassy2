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
    return view('home');
});
Route::group(['prefix' => 'admin'], function(){
    Route::get('/user/index', 'Admin\UserController@index')->middleware('auth');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@add');
Route::post('/profile', 'ProfileController@create');

Route::get('/post/create', 'PostController@add');
Route::post('/post/create', 'PostController@create');

Route::get('post/edit', 'PostController@edit');
Route::post('post/update', 'PostController@update');

Route::get('/post/front', 'PostController@index');

Route::get('/post/{id}', 'PostController@show');

Route::post('post/{post}/comments', 'CommentController@store');

Route::resource('/users', 'UserController', ['only' => ['show']]);

Route::get('post/delete', 'PostController@delete');

Route::get('/', 'EntranceController@enter');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


