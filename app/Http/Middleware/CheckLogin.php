<?php
namespace App\Http\Middleware;

use Closure;

class CheckLogin {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (!isset($_COOKIE['adminId'])) {
			header('location:' . url('admin/user/login'));
			exit();
		}
		return $next($request);
	}
}
