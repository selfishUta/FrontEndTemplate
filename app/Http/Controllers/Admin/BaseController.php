<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class BaseController extends Controller {
	public function __construct() {
		// 判断用户是否登录
		$this->middleware('login');
	}
}