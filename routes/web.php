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


//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

//Auth::user()->name;

//Auth::user()->name;
/* define role for Authentication */

//$role=Auth::user()->role;


Route::get('/home', 'HomeController@index')->name('home');


Route::get('/admin/dashboard', 'HomeController@index')->name('home');

Route::namespace('Backend')->group(function () {

    Route::get('/', 'PostController@index')->name('posts');

//    Route::get('/', function () {
//        return view('welcome');
//    });

    Route::get('/admin/showusers', 'AdminController@showuser')->name('users');

    Route::get('/admin/getDetails', 'AdminController@getDetails')->name('getuserDetails');

    Route::POST('/admin/create', 'AdminController@create')->name('insertuser');

    Route::POST('/admin/update', 'AdminController@update')->name('update');

    Route::get('/admin/test', 'AdminController@test')->name('test');

    Route::get('/admin/delete_user', 'AdminController@delete_user')->name('delete_user');

    Route::get('/post/create', 'PostController@create')->name('post.create');

    Route::post('/post/store', 'PostController@store')->name('post.store');

    // Route::get('/posts', 'PostController@index')->name('posts');

    Route::get('/post/show/{id}', 'PostController@show')->name('post.show');

    Route::get('/admin/delete_user', 'AdminController@delete_user')->name('delete_user');

    Route::get('/posts', 'PostController@index')->name('posts');

    Route::post('/post/store', 'PostController@store')->name('post.store');

    Route::get('/post/show/{id}', 'PostController@show')->name('post.show');

});


Route::namespace('Frontend')->group(function () {

    Route::get('/user/dashboard', 'UserController@index')->name('home');

    Route::get('/user/profile', 'UserController@profile')->name('profile');

    Route::POST('/user/updateprofile', 'UserController@updateprofile')->name('updateprofile');


});


Route::post('/comment/store', 'CommentController@store')->name('comment.store');

Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');

Route::get('/userdashboard', 'AdminController@userdashboard')->name('userdashboard');

Route::get('/userpost', 'PostController@userpost')->name('userpost');



