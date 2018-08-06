<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller {

	/**
	 * 功能: 展示后台登陆界面
	 */
	public function login() {
		return view('admin/user/login');
	}

	/**
	 * 功能: 用户登录信息检查
	 */
	public function check(Request $request) {
		// 用户名 admin 密码 123456
		$username = trim($request->get('username'));
		$password = trim($request->get('password'));
		$this->validate($request,
			[
				'username' => 'required',
				'password' => 'required|min:5'
			],
			[
				'username.required' => '用户名不能为空',
				'password.required' => '密码不能为空',
				'password.min' => '密码最小5位'
			]
		);
		//$result = User::where('username',$username)->where('password',$password)->count();
		if ($username == 'admin' && $password == '123456') {
			setcookie('adminId', 1, 0, '/');
			setcookie('adminname', $username, 0, '/');

			return redirect(url('admin'));
		} else {
			return redirect(url('admin/user/login'))->with('message', '用户名或密码错误');
		}
	}

	/**
	 * 功能: 用户退出操作
	 */
	public function logout() {

		setcookie('adminId', '', time() - 1, '/');
		setcookie('adminname', '', time() - 1, '/');

		return redirect(url('admin/user/login'));
	}

	/**
	 * 功能: 请求:get|post   显示添加页面,添加用户
	 */
	public function add(Request $request){
		if($request->isMethod('get')){
			return view('admin/user/add');
		}elseif($request->isMethod('post')){

		}
	}

}