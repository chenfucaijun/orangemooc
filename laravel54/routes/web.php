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

//保存新创建的文章
Route::post('/posts', '\App\Http\Controllers\PostController@store');

//文章详情页
Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');

//编辑文章
Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');


//图片上传
Route::post('/posts/image/upload', '\App\Http\Controllers\PostController@imageUpload');
Route::post('/posts/comment', '\App\Http\Controllers\PostController@comment');
Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostController@zan');
Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostController@unzan');

Route::get('/posts/search', '\App\Http\Controllers\PostController@search');
