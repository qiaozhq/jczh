<?php
namespace Common\Model;
use Think\Model;

/**
 * 基本设置
 * @author  singwa
 */
class BasicModel extends Model {

	public function __construct() {

	}
	//使用模块：admin
	public function save($data = array()) {
		if(!$data) {
			throw_exception('没有提交的数据');
		}
		$id = F('basic_web_config', $data);
		return $id;
	}

	//使用模块：admin home
	public function select() {
		return F("basic_web_config");
	}
}
