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
    Route::match(['post','get'],'Book/add','BookController@add');
    Route::match(['post','get'],'Book/show','BookController@show');
    Route::match(['post','get'],'Book/del','BookController@del');
    Route::match(['post','get'],'Book/update','BookController@update');

});
Route::get('','IndexController@index');//后台首页
















































































Route::group(["prefix"=>'/user',"namespace"=>"User"],function (){
    Route::get("info","UserController@info");
    Route::get("update","UserController@update");
    Route::post("up","UserController@up");
    Route::get("reading","UserController@reading");
    Route::get("session","UserController@session");
});































Route::group(["prefix"=>'/Register',"namespace"=>"Register"],function (){
    Route::get("index","RegisterController@index");
    Route::POST("Register","RegisterController@Register");
    Route::get("phone","RegisterController@phone");
    Route::POST("RegisterDo","RegisterController@RegisterDo");
    Route::POST("OnlyUser","RegisterController@OnlyUser");

});
Route::group(["prefix"=>'/Login',"namespace"=>"Login"],function (){
    Route::get("index","LoginController@index");
});











