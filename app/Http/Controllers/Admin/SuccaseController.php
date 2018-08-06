<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Succase;
use App\Type;

class SuccaseController extends BaseController{

	/**
	 * 功能: 添加公司服务
	 * 		 get请求     展示    
	 *		 post请求    添加
	 */
	public function add(Request $request) {
		// 判断请求方式
		if($request->isMethod('get')) {
			// 获取分类数据
			$typeCols = Type::get();
			return view('admin/succase/add',['typeCols'=>$typeCols]);
		}elseif ($request->isMethod('post')) {
			// 接收数据
			$arr = $request->all();
			// 验证数据
			$this->validateSelf($request);
			// 保存图片
			$image = $request->file('image') ?? false;
			if (!$image){
				return redirect()->back()->with('message','必须上传图片');
			}
			$imageSavePath = $this->checkImage($image);
			if (strpos($imageSavePath,'/')) {
				$arr['image'] = $imageSavePath;
			}else {
				return redirect()->back()->with('message',$imageSavePath);
			}
			// 可添加字段
			$fieldsArr = ['title','description','typeid','image','url'];
			$succase = new Succase;
			foreach($arr as $k => $v) {
				if(in_array($k, $fieldsArr)) {
					$succase->$k = trim($v);
				}
			}
			$result = $succase->save();
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
		$listCols = succase::get();
		return view('admin/succase/list',['listCols'=>$listCols]);
	}

	/**
	 * 功能: ajax根据id展示公司服务详情
	 */
	public function showById(Request $request) {
		$id = $request->get('id');
		$cols = Succase::where('id',$id)->first();
		if ($cols) {
			$type = Type::where('id',$cols->typeid)->first()->title;
			$data = [
				'title' => $cols->title,
				'image' => $cols->image,
				'id' => $id,
				'description' => $cols->description,
				'type' => $type
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
		$re = Succase::where('id',$id)->delete();
		if ($re) {
			$message = '';
		}else {
			$message = '删除失败';
		}
		return redirect()->back()->with('message',$message);
	}

	/**
	 * 功能: ajax根据id编辑服务
	 */
	public function edit($id,Request $request) {
		$succase = Succase::where('id',$id)->first();
		if ($request->isMethod('get')) {
			$typeCols = Type::get();
			return view('admin/succase/edit',['cols'=>$succase,'typeCols'=>$typeCols]);
		}elseif($request->isMethod('post')) {
			// 接收数据
			$arr = $request->all();
			// 验证数据
			$this->validateSelf($request);

			//验证上否更新图片
			$image = $request->file('image') ?? false;
			if($image) {
				$imageSavePath = $this->checkImage($image);
				if(strpos($imageSavePath,'/')){
					$arr['image'] = $imageSavePath;
					// 删除本地图片
					@unlink('./upload/' . $succase->image);
				}else {
					return redirect()->back()->with('message',$imageSavePath);
				}
			}else {
				unset($arr['image']);
			}
			
			// 更新数据
			$fieldsArr = ['title','description','typeid','image','url'];
			foreach($arr as $k => $v) {
				if(in_array($k, $fieldsArr)) {
					$succase->$k = trim($v);
				}
			}
			$re = $succase->save();
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
				'title' => 'required|unique:business|max:50|min:2',
				'description' => 'required|min:5',
				'typeid' =>  ['required', 'regex:/^[1-9]\d*$/'],
				'url' => 'url'
			],
			[
				'title.required' => '标题名称必须填写',
				'title.unique' => '标题名称已经存在',
				'title.max' => '标题名称最大50个字符',
				'title.min' => '标题名称最小2个字符',
				'description.min' => '描述最小5个字符',
				'description.required' => '描述不能为空',
				'typeid.required' => '类型不能为空',
				'typeid.regex' => '类型不存在',
				'url.url' => '网址格式不正确'
			]
		);
	}

	/**
	 * 功能: 验证图片
	 */
	private function checkImage($image){
		// 验证图片上传是否成功
		if($image->getError() == 0) {
			// 验证图片格式
			$imageTypes = ['image/png','image/gif','image/jpg','image/jpeg'];
			if(in_array($image->getClientMimeType(),$imageTypes)){
				// 验证图片大小 小于50Kb
				if ($image->getClientSize() < 55*1024) {
					// 保存图片
					$date = date('Y-m-d');
					$imageSave = $image->store($date,'my');
					if (!empty($imageSave)) {
						return $imageSave;
					}else {
						$imageMessage = '图片保存失败';
					}
				}else {
					$imageMessage = '图片尺寸不能大于55Kb';
				}
			}else {
				$imageMessage = '图片格式不正确';
			}
		}else {
			$imageMessage = '图片上传失败';
		}
		return $imageMessage;
	}

}