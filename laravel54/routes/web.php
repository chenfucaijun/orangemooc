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


//文章列表页
Route::get('/posts', '\App\Http\Controllers\PostController@index');
//创建文章
Route::get('/posts/create', '\App\Http\Controllers\PostController@create');
Route::post('/posts', '\App\Http\Controllers\PostController@store');
Route::get('/posts/search', '\App\Http\Controllers\PostController@search');
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');
Route::post('/posts/img/upload', '\App\Http\Controllers\PostController@imageUpload');
Route::post('/posts/comment', '\App\Http\Controllers\PostController@comment');
Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostController@zan');
Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostController@unzan');