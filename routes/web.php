<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can Register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['prefix' => '/admin','namespace' => 'Admin'],function(){
    Route::get('','IndexController@index');//后台首页
    Route::get('Index/left','IndexController@left');//后台首页
    Route::get('Index/top','IndexController@top');
    Route::get('Index/main','IndexController@main');

});
Route::get('','IndexController@index');//后台首页
















































































    Route::get("user/info","UserController@info");
    Route::get("user/update","UserController@update");
    Route::post("user/up","UserController@up");
    Route::get("user/reading","UserController@reading");
    Route::get("user/session","UserController@session");
    Route::post("user/turn","UserController@turn");
    Route::get("user/examine","UserController@examine");





























    Route::get("Register/index","RegisterController@index");
    Route::POST("Register/Register","RegisterController@Register");
    Route::get("Register/phone","RegisterController@phone");
    Route::POST("Register/RegisterDo","RegisterController@RegisterDo");
    Route::POST("Register/OnlyUser","RegisterController@OnlyUser");

    Route::get("Login/index","LoginController@index");
    Route::post("Login/Login","LoginController@Login");












