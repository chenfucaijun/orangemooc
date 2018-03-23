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




//Route::get('/recommend', "\App\Http\Controllers\RecomController@index");


//登录
Route::get('/login', "\App\Http\Controllers\LoginController@index");
Route::post('/login', "\App\Http\Controllers\LoginController@login");
Route::get('/logout', "\App\Http\Controllers\LoginController@logout");


//注册
Route::get('/register', "\App\Http\Controllers\RegisterController@index");
Route::post('/register', "\App\Http\Controllers\RegisterController@register");



Route::group(['middleware' => 'auth'], function () {

// 个人设置
    Route::get('/user/me/setting', '\App\Http\Controllers\UserController@setting');
    Route::post('/user/me/setting', '\App\Http\Controllers\UserController@settingStore');


//文章列表页
    Route::get('/posts', '\App\Http\Controllers\PostController@index');

//创建文章
    Route::get('/posts/create', '\App\Http\Controllers\PostController@create');

//搜索
    Route::get('/posts/search', '\App\Http\Controllers\PostController@search');


//保存新创建的文章
    Route::post('/posts', '\App\Http\Controllers\PostController@store');

//文章详情页
    Route::get('/posts/{post}', '\App\Http\Controllers\PostController@show');

//编辑文章
    Route::get('/posts/{post}/edit', '\App\Http\Controllers\PostController@edit');
    Route::put('/posts/{post}', '\App\Http\Controllers\PostController@update');

//删除文章
    Route::get('/posts/{post}/delete', '\App\Http\Controllers\PostController@delete');


//图片上传
    Route::post('/posts/image/upload', '\App\Http\Controllers\PostController@imageUpload');

//提交评论
    Route::post('/posts/{post}/comment', '\App\Http\Controllers\PostController@comment');

//点赞和取消点赞
    Route::get('/posts/{post}/zan', '\App\Http\Controllers\PostController@zan');
    Route::get('/posts/{post}/unzan', '\App\Http\Controllers\PostController@unzan');


// 个人设置
    Route::get('/user/{user}/setting', '\App\Http\Controllers\UserController@setting');
    Route::post('/user/{user}/setting', '\App\Http\Controllers\UserController@settingStore');

// 个人主页
    Route::get('/user/{user}', '\App\Http\Controllers\UserController@show');
    Route::post('/user/{user}/fan', '\App\Http\Controllers\UserController@fan');
    Route::post('/user/{user}/unfan', '\App\Http\Controllers\UserController@unfan');


//专题详情页
    Route::get('/topic/{topic}', '\App\Http\Controllers\TopicController@show');
//投稿
    Route::post('/topic/{topic}/submit', '\App\Http\Controllers\TopicController@submit');

//通知页面
    Route::get('/notices', '\App\Http\Controllers\NoticeController@index');

//课程页面,显示所有课程界面，推荐课程页面
    Route::get('/courses', '\App\Http\Controllers\CourseController@all_index');
    Route::get('/courses/recommend', '\App\Http\Controllers\CourseController@index');


//课程的增删改查
    Route::get('/courses/{course}', '\App\Http\Controllers\CourseController@show');
//新增课程
    Route::get('/courses/{course}/create', '\App\Http\Controllers\CourseController@show');
    Route::get('/courses/{course}/posts', '\App\Http\Controllers\CourseController@show');
//编辑课程
    Route::get('/courses/{course}/edit', '\App\Http\Controllers\CourseController@edit');
    Route::put('/courses/{course}/edit', '\App\Http\Controllers\CourseController@update');
//删除课程
    Route::get('/courses/{course}/delete', '\App\Http\Controllers\CourseController@show');




});

include_once('admin.php');