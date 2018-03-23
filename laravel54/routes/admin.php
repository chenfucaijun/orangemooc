<?php

//管理后台
Route::group(['prefix' => 'admin'], function () {
    //登录展示页面
    Route::get('login', '\App\Admin\Controllers\LoginController@index');
    //登录请求
    Route::post('login', '\App\Admin\Controllers\LoginController@login');
    ///登出请求
    Route::get('logout', '\App\Admin\Controllers\LoginController@logout');


    //增加中间件
    Route::group(['middleware' => 'auth:admin'], function () {
        //首页
        Route::get('home', '\App\Admin\Controllers\HomeController@index');


        //管理人员权限中间件
        Route::group(['middleware' => 'can:system'], function () {
            // 管理人员模块：用户管理
            Route::get('/users', '\App\Admin\Controllers\UserController@index');
            Route::get('/users/create', '\App\Admin\Controllers\UserController@create');
            Route::post('/users/store', '\App\Admin\Controllers\UserController@store');
            Route::get('/users/{user}/role', '\App\Admin\Controllers\UserController@role');
            Route::post('/users/{user}/role', '\App\Admin\Controllers\UserController@storeRole');
            // 管理人员模块：角色管理
            Route::get('/roles', '\App\Admin\Controllers\RoleController@index');
            Route::get('/roles/create', '\App\Admin\Controllers\RoleController@create');
            Route::post('/roles/store', '\App\Admin\Controllers\RoleController@store');
            Route::get('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@permission');
            Route::post('/roles/{role}/permission', '\App\Admin\Controllers\RoleController@storePermission');
            // 管理人员模块：权限管理
            Route::get('/permissions', '\App\Admin\Controllers\PermissionController@index');
            Route::get('/permissions/create', '\App\Admin\Controllers\PermissionController@create');
            Route::post('/permissions/store', '\App\Admin\Controllers\PermissionController@store');
        });

        Route::group(['middleware' => 'can:post'], function () {
            //文章审核模块
            Route::get('/posts', '\App\Admin\Controllers\PostController@index');
            Route::post('/posts/{post}/status', '\App\Admin\Controllers\PostController@status');
        });


        //话题增添改查
        Route::resource('topics', '\App\Admin\Controllers\TopicController');

        //通知增添改查
        Route::group(['middleware' => 'can:notice'], function () {

            Route::resource('notices', '\App\Admin\Controllers\NoticeController');

        });


    });


});