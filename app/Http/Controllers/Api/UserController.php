<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller {
	public function login(Request $request) {
		$username = $request->get('username');
		$password = $request->get('password');
		$user = DB::table('user')->where('username', $username)
			->where('password', md5($password))
			->first();
		if ($user) {
			$arr = [
				'type' => 'success',
				'data' => $user,
				'msg' => '登录成功',
			];
		} else {
			$arr = [
				'type' => 'error',
				'data' => null,
				'msg' => '登录失败',
			];
		}
		echo json_encode(serialize($arr));
	}
}