<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Business extends Model {
	protected $table = 'business';

	public $timestamps = false;

	public function showTypeById($id) {
		$cols = Type::where('id',$id)->first();
		if($cols){
			return $cols->title;
		}else {
			return '无';
		}
	}
}