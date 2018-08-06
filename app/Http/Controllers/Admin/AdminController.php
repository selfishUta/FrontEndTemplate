<?php
namespace App\Http\Controllers\Admin;

class AdminController extends BaseController{
	public function index() {
		/**
		 * 功能: 后台首页
		 */
		return view('admin/index');
	}
}