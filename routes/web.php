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

// 前台显示主页
Route::get('/', 'IndexController@index');

// 显示验证码
Route::get('captcha/show', 'CaptchaController@show');

// 后台分组路由
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {

	// 后台登陆页面
	Route::get('user/login', 'UserController@login');

	// 后台登陆检查
	Route::post('user/check', 'UserController@check');

	// 后台退出操作
	Route::get('user/logout', 'UserController@logout');

	// 后台首页
	Route::get('/', 'AdminController@index');

	//==================================================================

	// 后台展示公司服务添加页面
	Route::get('business/add', 'BusinessController@add');

	// 后台添加公司服务
	Route::post('business/add', 'BusinessController@add');

	// 后台公司服务列表
	Route::get('business/list', 'BusinessController@list');

	// 后台公司服务列表ajax展示详情
	Route::get('business/showById', 'BusinessController@showById');

	// 后台公司服务列表根据id删除服务
	Route::get('business/del/{id}', 'BusinessController@del');

	// 后台公司服务列表根据id编辑服务
	Route::get('business/edit/{id}', 'BusinessController@edit');

	// 后台公司服务列表根据id更新服务
	Route::post('business/edit/{id}', 'BusinessController@edit');

	//=================================================================
	// 后台公司成功案例类型列表
	Route::get('type/list', 'TypeController@list');

	// ajax后台展示公司成功案例类型添加页面
	Route::get('type/add', 'TypeController@add');

	// 后台公司成功案例类型根据id编辑
	Route::get('type/edit/{id}', 'TypeController@edit');

	// 后台公司成功案例类型根据id更新
	Route::post('type/edit/{id}', 'TypeController@edit');

	// 后台公司成功案例类型根据id删除
	Route::get('type/del/{id}', 'TypeController@del');

	//=================================================================

	// 后台展示公司成功案例添加页面
	Route::get('succase/add', 'SuccaseController@add');

	// 后台添加公司成功案例
	Route::post('succase/add', 'SuccaseController@add');

	// 后台公司成功案例列表
	Route::get('succase/list', 'SuccaseController@list');

	// 后台公司成功案例列表ajax展示详情
	Route::get('succase/showById', 'SuccaseController@showById');

	// 后台公司成功案例列表根据id删除服务
	Route::get('succase/del/{id}', 'SuccaseController@del');

	// 后台公司成功案例列表根据id编辑服务
	Route::get('succase/edit/{id}', 'SuccaseController@edit');

	// 后台公司成功案例列表根据id更新服务
	Route::post('succase/edit/{id}', 'SuccaseController@edit');

	//=================================================================

	// 公司留言添加
	Route::post('message/add', 'MessageController@add');

	// 后台公司留言列表
	Route::get('message/list', 'MessageController@list');

	// 后台公司留言ajax展示详情
	Route::get('message/showById', 'MessageController@showById');

	// 后台公司留言列表根据id删除服务
	Route::get('message/del/{id}', 'MessageController@del');

	//=================================================================

	// 后台用户列表
	Route::get('user/list', 'UserController@list');

	// ajax后台展示用户添加页面
	Route::get('user/add', 'UserController@add');

	// 后台用户根据id编辑
	Route::get('user/edit/{id}', 'UserController@edit');

	// 后台用户根据id更新
	Route::post('user/edit/{id}', 'UserController@edit');

	// 后台用户根据id删除
	Route::get('user/del/{id}', 'UserController@del');

	//=================================================================


});

