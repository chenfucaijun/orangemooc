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
    Route::group(['middleware'=>'auth:admin'],function (){
        //首页
        Route::get('home', '\App\Admin\Controllers\HomeController@index');
    });


    

});