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
//前台首页
Route::get('/',function()
{
	return view('home.index',['title'=>'星星商城']);
});

//后台登陆页面
Route::any('admin/login','Admin\LoginController@login');
Route::any('admin/dologin','Admin\LoginController@dologin');
Route::any('admin/cap','Admin\LoginController@captcha');

//后台
Route::group(['middleware'=>'adminlogin'],function()
{
	
	//后台用户模块
	Route::resource('admin/adminUser','Admin\AdminUserController');
	
	//修改头像
	Route::any('admin/profile','Admin\LoginController@profile');
	Route::any('admin/doprofile','Admin\LoginController@doprofile');

	//修改密码
	Route::any('admin/pass','Admin\LoginController@pass');
	Route::any('admin/dopass','Admin\LoginController@dopass');

	//退出后台
	Route::any('admin/logout','Admin\LoginController@logout');

	//前台用户模块
	Route::resource('admin/homeUser','Admin\homeUserController');
	Route::resource('admin/gtype','admin\gtype\GtypeController');
	Route::resource('admin/goods','admin\goods\GoodsController');
});




//前台登陆页面
Route::any('home/login','Home\LoginController@login');
Route::any('home/dologin','Home\LoginController@dologin');
//前台注册页面
Route::any('home/zhuce','Home\LoginController@zhuce');
Route::any('home/dozhuce','Home\LoginController@dozhuce');

//前台
Route::group(['middleware'=>'homelogin'],function()
{
	

});