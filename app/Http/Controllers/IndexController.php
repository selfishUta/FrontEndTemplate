<?php
namespace App\Http\Controllers;

use App\Succase;
use App\Type;
use App\Business;

class IndexController extends Controller {
	/**
	 * 功能: 展示主页
	 * @return [type] [description]
	 */
	public function index() {
		// 查询公司服务
		$businessCols = Business::get();
		// 查询公司成功案例类型
		$typeCols = Type::get();
		// 查询公司成功案例图片
		$succaseCols = Succase::select('succase.*','t1.foreign_title as type_foreign_title','t1.title as typename')
			->join('type as t1','t1.id' , '=','succase.typeid')
			->orderBy('succase.typeid')->get();
		return view('index',['businessCols'=>$businessCols,'succaseCols'=>$succaseCols,'typeCols'=>$typeCols]);
	}

}


