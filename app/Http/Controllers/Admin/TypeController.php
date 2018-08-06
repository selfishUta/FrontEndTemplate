<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Type;

class TypeController extends BaseController{
	/**
	 * 功能: ajax添加公司服务
	 */
	public function add(Request $request) {
		// 接收数据
		$title = $request->get('title');
		$foreign_title = $request->get('foreign_title');
		// 验证数据
		$this->validate($request, [
				'title' => 'unique:type'
			],
			[
				'title.unique' => '名称已经存在'
			]
		);
		$this->validateSelf($request);
		// 可添加字段
		$id = Type::insertGetId(['title'=>$title,'foreign_title'=>$foreign_title]);
		if($id !== false) {
			$arr['data'] = ['title'=>$title,'foreign_title'=>$foreign_title,'id'=>$id,'url'=>url('admin/type')];

			$arr['status'] = 'success';
		}else {
			$arr['status'] = 'error';
		}
		echo json_encode($arr);
	}

	/**
	 * 功能: 展示公司服务列表
	 */
	public function list() {
		$listCols = Type::get();
		return view('admin/type/list',['listCols'=>$listCols]);
	}

	/**
	 * 功能: 根据id删除服务
	 */
	public function del($id) {
		$re = Type::where('id',$id)->delete();
		if ($re) {
			$message = '';
		}else {
			$message = '删除失败';
		}
		return redirect()->back()->with('message',$message);
	}

	/**
	 * 功能: 根据id编辑服务
	 */
	public function edit($id,Request $request) {
		$type = Type::where('id',$id)->first();
		if ($request->isMethod('get')) {

			return view('admin/type/edit',['cols'=>$type]);
		}elseif($request->isMethod('post')) {
			// 接收数据
			$title = $request->get('title');
			$foreign_title = $request->get('foreign_title');

			// 验证数据
			$this->validateSelf($request);

			// 更新数据
			$type->title = $title;
			$type->foreign_title = $foreign_title;
			$re = $type->save();

			if($re) {
				$message = '';
			}else {
				$message = '更新失败';
			}
			return redirect()->back()->with('message',$message);
		}
	}

	/**
	 * 功能: 验证字段值
	 */
	private function validateSelf($request) {
		$this->validate($request, [
				'title' => 'required|max:50|min:2',
				'foreign_title' => ['regex:/^[a-z_A-Z]*$/']
			],
			[
				'title.required' => '名称必须填写',
				'title.max' => '名称最大50个字符',
				'title.min' => '名称最小2个字符',
				'foreign_title.regex' => '格式不正确'
			]
		);
	}
}