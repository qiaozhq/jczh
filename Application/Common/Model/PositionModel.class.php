<?php
namespace Common\Model;
use Think\Model;
/**
 * 推荐位操作
 * 
 */
class PositionModel extends Model {
	private $_db = '';

	public function __construct() {
		$this->_db = M('position');
	}

	//使用模块：admin
	public function select($data = array()) {
		$conditions = $data;
		$list = $this->_db->where($conditions)->order('id')->select();
		return $list;
	}

	//使用模块：admin
	public function find($id) {
		$data = $this->_db->where('id='.$id)->find();
		return $data;
	}

    //使用模块：admin
    public function insert($res=array()) {
    	if(!$res || !is_array($res)) {
    		return 0;
    	}
		$res['create_time'] = time();
    	return $this->_db->add($res);
    }

    //使用模块：admin
	public function updateStatusById($id, $status) {
		if(!is_numeric($status)) {
			throw_exception("status不能为非数字");
		}
		if(!$id || !is_numeric($id)) {
			throw_exception("ID不合法");
		}
		$data['status'] = $status;
		return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录

	}

	//使用模块：admin
	public function updateById($id, $data) {

		if(!$id || !is_numeric($id)) {
			throw_exception("ID不合法");
		}
		if(!$data || !is_array($data)) {
			throw_exception('更新的数据不合法');
		}
		return  $this->_db->where('id='.$id)->save($data); // 根据条件更新记录
	}

	// 获取正常的推荐位内容 使用模块：admin
	public function getNormalPositions() {
		$conditions = array('status'=>1);
		$list = $this->_db->where($conditions)->order('id')->select();
		return $list;
	}

}
