<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Business;

class BusinessController extends BaseController{
	/**
	 * 功能: 添加公司服务
	 * 		 get请求     展示    
	 *		 post请求    添加
	 */
	public function add(Request $request) {
		// 判断请求方式
		if($request->isMethod('get')) {
			return view('admin/business/add');
		}elseif ($request->isMethod('post')) {
			// 接收数据
			$arr = $request->all();
			// 验证数据
			$this->validate($request, [
					'title' => 'unique:business'
				],
				[
					'title.unique' => '标题名称已经存在'
				]
			);
			$this->validateSelf($request);
			// 可添加字段
			$fieldsArr = ['title','content','typeid'];
			$business = new Business;
			foreach($arr as $k => $v) {
				if(in_array($k, $fieldsArr)) {
					$business->$k = trim($v);
				}
			}
			$result = $business->save();
			if($result) {
				$message = '';
			}else {
				$message = '添加失败';
			}
			return redirect()->back()->with('message',$message);
		}
	}

	/**
	 * 功能: 展示公司服务列表
	 */
	public function list() {
		$listCols = Business::get();
		return view('admin/business/list',['listCols'=>$listCols]);
	}

	/**
	 * 功能: ajax根据id展示公司服务详情
	 */
	public function showById(Request $request) {
		$id = $request->get('id');
		$cols = Business::where('id',$id)->first();
		if ($cols) {
			$data = [
				'title' => $cols->title,
				'content' => $cols->content,
				'id' => $id
			];
			$arr['status'] = 'success';
			$arr['data'] = $data;
		}else {
			$arr['status'] = 'error';
		}
		echo json_encode($arr);
	}

	/**
	 * 功能: ajax根据id删除服务
	 */
	public function del($id) {
		$re = Business::where('id',$id)->delete();
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
		$business = Business::where('id',$id)->first();
		if ($request->isMethod('get')) {

			return view('admin/business/edit',['cols'=>$business]);
		}elseif($request->isMethod('post')) {
			// 接收数据
			$arr = $request->all();
			// 验证数据
			$this->validateSelf($request);
			// 更新数据
			$fieldsArr = ['title','content','typeid'];
			foreach($arr as $k => $v) {
				if(in_array($k, $fieldsArr)) {
					$business->$k = trim($v);
				}
			}
			$re = $business->save();
			if($re) {
				$message = '';
			}else {
				$message = '更新失败';
			}
			return redirect()->back()->with('message',$message);

		}
	}

	/**
	 * 功能: 验证服务字段值
	 */
	private function validateSelf($request) {
		$this->validate($request, [
				'title' => 'required|max:50|min:3',
				'content' => 'required|min:10'
			],
			[
				'title.required' => '标题名称必须填写',
				'title.unique' => '标题名称已经存在',
				'title.max' => '标题名称最大50个字符',
				'title.min' => '标题名称最小3个字符',
				'content.min' => '描述最小10个字符',
				'content.required' => '描述不能为空',
			]
		);
	}
}