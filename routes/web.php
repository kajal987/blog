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

//Auth::user()->name;

//Auth::user()->name;
/* define role for Authentication */

//$role=Auth::user()->role;


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users', 'AdminController@showuser')->name('showuser');

Route::get('/admin/getDetails', 'AdminController@getDetails')->name('getDetails');

Route::get('/post/create', 'PostController@create')->name('post.create');

Route::post('/post/store', 'PostController@store')->name('post.store');

Route::get('/posts', 'PostController@index')->name('posts');

Route::get('/post/show/{id}', 'PostController@show')->name('post.show');


