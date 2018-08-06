<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Type;
use App\Message;

class MessageController extends BaseController{
	/**
	 * 功能: ajax添加message
	 */
	public function add(Request $request) {
		// 接收数据
		$data = $request->all();
		// 验证数据
		$this->validateSelf($request);
		// 可添加字段
		// 可添加字段
		$fieldsArr = ['username','email','phone','content','created'];
		$data['created'] = time();
		$message = new Message;
		foreach($data as $k => $v) {
			if(in_array($k, $fieldsArr)) {
				$message->$k = trim($v);
			}
		}
		$result = $message->save();
		if($result !== false) {
			$arr['status'] = 'success';
		}else {
			$arr['status'] = 'error';
		}
		return redirect()->back();
	}

	/**
	 * 功能: 展示留言列表
	 */
	public function list() {
		$listCols = Message::orderBy('created')->paginate(10);
		return view('admin/message/list',['listCols'=>$listCols]);
	}

	/**
	 * 功能: ajax根据id展示公司服务详情
	 */
	public function showById(Request $request) {
		$id = $request->get('id');
		$cols = Message::where('id',$id)->first();
		if ($cols) {
			$data = [
				'content' => $cols->content
			];
			$arr['status'] = 'success';
			$arr['data'] = $data;
		}else {
			$arr['status'] = 'error';
		}
		echo json_encode($arr);
	}

	/**
	 * 功能: 根据id删除服务
	 */
	public function del($id) {
		$re = Message::where('id',$id)->delete();
		if ($re) {
			$message = '';
		}else {
			$message = '删除失败';
		}
		return redirect()->back()->with('message',$message);
	}

	/**
	 * 功能: 验证字段值
	 */
	private function validateSelf($request) {

		$this->validate($request, [
				'username' => 'required|max:100',
				'email' => 'email',
				'phone' => ['required','regex:/\d+/'],
				'content' => 'required|min:10'
			],
			[
				'title.required' => '名称必须填写',
				'title.unique' => '名称已经存在',
				'title.max' => '名称最大50个字符',
				'title.min' => '名称最小2个字符'
			]
		);
	}
}