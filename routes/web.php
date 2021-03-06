﻿<?php
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
    Route::match(['post','get'],'Login/login','LoginController@login');//后台登录
    Route::match(['post','get'],'Login/loginout','LoginController@loginout');//后台登出
    Route::match(['post','get'],'Classify/classify','ClassifyController@classify');//图书分类
    Route::match(['post','get'],'Classify/show','ClassifyController@show');//图书分类展示
    Route::get('Classify/delete/{id}','ClassifyController@delete');//图书分类删除
    Route::match(['post','get'],'Classify/update','ClassifyController@update');//图书分类修改
    Route::match(['post','get'],'Classify/update_type','ClassifyController@update_type');//图书分类修改

    Route::match(['post','get'],'Admins/add','AdminsController@add');//后台管理员添加
    Route::match(['post','get'],'Admins/show','AdminsController@show');//后台管理员展示
    Route::match(['post','get'],'Admins/up','AdminsController@up');//后台管理员展示（ajax）
    Route::match(['post','get'],'Users/show','UsersController@show');//前台管理员展示
    Route::match(['post','get'],'Users/up','UsersController@up');//前台管理员展示（ajax）
    Route::get('Index/top','IndexController@top');
    Route::get('Index/main','IndexController@main');
    Route::match(['post','get'],'Book/add','BookController@add');
    Route::match(['post','get'],'Book/show','BookController@show');
    Route::match(['post','get'],'Book/del','BookController@del');
    Route::match(['post','get'],'Book/update','BookController@update');
    Route::get('Do/show','DoController@show');
    Route::match(['post','get'],'Do/auditing','DoController@auditing');
});
Route::get('','IndexController@index');
Route::post('','IndexController@index');






































































Route::get("user/info","UserController@info");
Route::get("user/update","UserController@update");
Route::post("user/up","UserController@up");
Route::post("user/insd","UserController@insd");
Route::get("user/reading","UserController@reading");
Route::get("user/session","UserController@session");
Route::post("user/turn","UserController@turn");
Route::get("user/examine","UserController@examine");
Route::get("user/pwd","UserController@pwd");
Route::post("user/exaup","UserController@exaup");
Route::post("user/pwdUp","UserController@pwdUp");
Route::any("user/borrowBooks","UserController@borrowBooks");

Route::get("user/exitUser","UserController@exitUser");






























    Route::get("Register/index","RegisterController@index");
    Route::POST("Register/Register","RegisterController@Register");
    Route::get("Register/phone","RegisterController@phone");
    Route::POST("Register/RegisterDo","RegisterController@RegisterDo");
    Route::POST("Register/OnlyUser","RegisterController@OnlyUser");




    Route::get("Login/index","LoginController@index");
    Route::post("Login/Login","LoginController@Login");











