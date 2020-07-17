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

Route::get("/user/reg","User\IndexController@reg");//注册
Route::post("/user/regDo","User\IndexController@regDo");//执行注册
Route::get("/user/log","User\IndexController@log");//登录
Route::post("/user/logDo","User\IndexController@logDo");//执行登录

Route::get("/user/center","User\IndexController@center");//个人中心
