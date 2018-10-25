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
	$res = DB::table('gtype')->where('pid','0')->get();
	return view('home.index',['title'=>'星星商城', 'res'=>$res]);
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
	// Route::any('admin/homeUser/message','Admin\homeUserController@message');

	

	// 后台商品分类
	Route::resource('admin/gtype','Admin\gtype\GtypeController');
	// 添加子分类
	Route::any('admin/add/{id}','Admin\gtype\GtypeController@add');
	Route::any('admin/gtypezi','Admin\gtype\GtypeController@zilei');
	// 后台商品信息
	Route::resource('admin/goods','admin\goods\GoodsController');

	//友情链接管理
	Route::resource('admin/link','admin\linkController');
	//广告管理
	Route::resource('admin/guanggao','admin\guanggaoController');


	//轮播图管理
	Route::resource('admin/lunbo','Admin\LunboController');
	// 订单管理
	Route::resource('admin/orders','Admin\goods\OrdersController');
	// 订单详情
	Route::any('admin/xiangqing/{id}','Admin\goods\xiangController@xiang');
	// ajax改变订单状态
	Route::post('admin/status','Admin\goods\xiangController@status');
	
});




//前台登陆页面
Route::any('home/login','Home\LoginController@login');
Route::any('home/dologin','Home\LoginController@dologin');
//前台退出登录
Route::any('home/logout','Home\LoginController@logout');
//前台注册页面
Route::any('home/zhuce','Home\LoginController@zhuce');
Route::any('home/dozhuce','Home\LoginController@dozhuce');

//前台
Route::group(['middleware'=>'homelogin'],function()
{
	//个人中心
	Route::any('home/centre','Home\LoginController@centre');
	//用户资料
	Route::any('home/message','Home\LoginController@message');
	//用户资料修改
	Route::any('home/upmess','Home\LoginController@upmess');
	//密码修改
	Route::any('home/pass','Home\LoginController@pass');
	Route::any('home/dopass','Home\LoginController@dopass');
	//收获信息
	Route::any('home/addr','Home\LoginController@addr');
	//添加收货信息
	Route::any('home/doaddr','Home\LoginController@doaddr');
	Route::any('home/add_addr','Home\LoginController@add_addr');
	//修改收货信息
	Route::any('home/{id}/upaddr','Home\LoginController@upaddr');
	Route::any('home/doupaddr/{id}','Home\LoginController@doupaddr');
	//设置默认地址
	Route::any('home/moren/{id}','Home\LoginController@moren');
	//删除收货信息
	Route::any('home/deladdr/{id}','Home\LoginController@deladdr');
	// 加入购物车
	Route::post('home/cart/{id}','Home\GoodsController@carts');
	// 从购物车用ajax移除1条数据
	Route::post('home/remove','Home\GoodsController@remove');
	// 查看购物车
	Route::any('home/cart','Home\GoodsController@cart');
	//商品收藏页
	Route::resource('home/love','Home\LoveController');
	Route::any('home/addlove/{id}','Home\LoveController@addlove');
	Route::any('home/delove/{id}','Home\LoveController@delove');

	// 商品详情页
	Route::get('home/goods/{id}','Home\GoodsController@goods');
	// 商品分类搜索
	Route::get('/homes/goods/{id}','Home\GoodsController@gtods');
	//商品页
	Route::get('home/shops','Home\GoodsController@shops');
	// 结算页
	Route::post('/home/jiesuan','Home\GoodsController@jiesuan');
	// ajax传参小计到数据库
	Route::post('home/gmsl','Home\GoodsController@gmsl');

	// 生成订单
	Route::post('home/xiangqing','Home\GoodsController@xiangqing');
	// 把订单遍历到页面
	Route::get('/home/orders','Home\GoodsController@orders');
	// ajax改变订单状态
	Route::post('admin/queren','Admin\goods\xiangController@queren');
	// 删除订单
	Route::post('admin/removes','Admin\goods\xiangController@removes');
});
	

